<?php

class CartController {

	public function actionAdd($id) {
		//Добавляем товар в корзину
		Cart::addProduct($id);

		//Возвращаем пользователя на страницу
		$referer = $_SERVER['HTTP_REFERER'];
		header("Location: $referer");
	}

	public function actionAddAjax($id) {
		// Добавляем товар в корзину
		echo Cart::addProduct($id);
		return true;
	}

	public function actionDelete($id) {
		Cart::deleteProduct($id);

		header("Location: /cart");
	}

	public function actionIndex() {
		$categories = array();
		$categories = Category::getCategoriesList();

		$productsInCart = false;

		// Получаем данные из корзины
		$productsInCart = Cart::getProducts();

		if ($productsInCart) {
			// Получаем полную информацию о товаров для списка
			$productsIds = array_keys($productsInCart);
			$products = Product::getProductsByIds($productsIds);

			// Получаем общую стоимость товаров
			$totalPrice = Cart::getTotalPrice($products);
		}

		require_once(ROOT . '/views/cart/index.php');

		return true;
	}

	public function actionCheckout() {
		// Список категорий для левого меню
		$categories = array();
		$categories = Category::getCategoriesList();

		// Статус успешного оформления заказа
		$result = false;

		// Форма отправлена?
		if (isset($_POST['submit'])) {
			// Форма отправлена? - Да

			// Считываем данные из формы
			$userName = $_POST['userName'];
			$userPhone = $_POST['userPhone'];
			$userComment = $_POST['userComment'];

			// Валидация полей
			$errors = false;
			if (!User::checkName($userName)) {
				$errors[] = 'Invalid name';
			}
			if (!User::checkPhone($userPhone)) {
				$errors[] = 'Invalid phone';
			}

			// Форма заполнена корректно?
			if ($errors == false) {
				// Форма заполнена корректно? - Да
				// Сохраняем заказ в базе данных

				// Собираем информацию о заказе
				$productInCart = Cart::getProducts();
				if (User::isGuest()) {
					$userId = false;
				} else {
					$userId = User::checkLogged();
				}

				// Сохраняем заказ в базе данных
				$result = Order::save($userName, $userPhone, $userComment, $userId, $productInCart);
				 if ($result) {
				 	// Оповещаем администратора о новом заказе
				 	$adminEmail = 'katerinabormotova@mail.ru';
				 	$message = 'http://localhost/admin/orders';
				 	$subject = 'New order';

				 	// Очищаем корзину
				 	Cart::clear();
				 }
			} else {
				// Форма заполнена корректно? - Нет

				// Итоги: общая стоимость, количество товаров
				$productsInCart = Cart::getProducts();
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$totalPrice = Cart::getTotalPrice($products);
				$totalQuantity = Cart::countItems();

			}
		} else {
			// Форма отправлена? - Нет

			// Получаем данные из корзины
			$productsInCart = Cart::getProducts();

			// В корзине есть товары?
			if ($productsInCart == false) {
				// В корзине есть товары? - Нет
				// Отправляем пользователя на главную искать товары
				header("Location: /");
			} else {
				// В корзине есть товары? - Да

				// Итоги: общая стоимость, количество товаров
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$totalPrice = Cart::getTotalPrice($products);
				$totalQuantity = Cart::countItems();

				$userName = false;
				$userPhone = false;
				$userComment = false;

				// Пользователь авторизован?
				if (User::isGuest()) {
					// Нет
					// Значения для формы пустые
				} else {
					// Да, авторизован
					// Получаем информацию о пользователе из БД по id
					$userId = User::checkLogged();
					$user = User::getUserById($userId);
					// Подставляем в форму
					$userName = $user['name'];
				}
			}
		}

		require_once(ROOT . '/views/cart/checkout.php');

		return true;
	}
}