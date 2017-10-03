<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями
 */
class AdminCategoryController extends AdminBase {

	/**
	 * Action для страницы "Category Management"
	 */
	public function actionIndex() {

		// Проверка доступа
		self::checkAdmin();

		// Получаем список категорий
		$categoriesList = Category::getCategoriesListAdmin();

		// Подключаем вид
		require_once(ROOT . '/views/admin_category/index.php');
		return true;
	}

	/**
	 * Action для страницы "Add category"
	 */
	public function actionCreate() {
		// Проверка доступа
		self::checkAdmin();

		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена
			// Получаем данные из формы
			$name = $_POST['name'];
			$sortOrder = $_POST['sort_order'];
			$status = $_POST['status'];

			// Флаг ошибки
			$errors = false;

			// При необходимости можно валидировать значения нужным образом
			if (!isset($name) || empty($name)) {
				$errors[] = 'Fill in the fields';
			}

			if ($errors == false) {
				// Если ошибок нет
				// Добавляем новую категорию

				Category::createCategory($name, $sortOrder, $status);

				// Перенаправляем пользователя на страницу управления категориями
				header("Location: /admin/category");
			}
		}

		require_once(ROOT . '/views/admin_category/create.php');
		return true;
	}

	/**
	 * Action для страницы "Edit category"
	 */
	public function actionUpdate($id) {

		// Проверка доступа
		self::checkAdmin();

		// Получаем данные о конкретной категории
		$category = Category::getCategoryById($id);

		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена
			// Получаем данные из формы
			$name = $_POST['name'];
			$sortOrder = $_POST['sort_order'];
			$status = $_POST['status'];

			// Сохраняем изменения
			Category::updateCategoryById($id, $name, $sortOrder, $status);

			// Перенаправляем пользователя на страницу управления категориями
			header("Location: /admin/category");
		}

		// Подключаем вид
		require_once(ROOT . '/views/admin_category/update.php');
		return true;
	}

	/**
	 * Action для страницы "Remove category"
	 */
	public function actionDelete($id) {
		// Проверка доступа
		self::checkAdmin();

		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена
			// Удаляем категорию
			Category::deleteCategoryById($id);

			// Перенаправляем пользователя на страницу управления категориями
			header("Location: /admin/category");
		}

		// Подключаем вид
		require_once(ROOT . '/views/admin_category/delete.php');
		return true;
	}
}