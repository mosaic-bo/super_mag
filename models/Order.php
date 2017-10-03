<?php

class Order {

	/**
	 * Сохранение заказа
	 * @param type $name
	 * @param type $email
	 * @param type $password
	 * @return type
	 */

	public static function save($userName, $userPhone, $userComment, $userId, $products) {
		$products = json_encode($products);
		
		$db = Db::getConnection();

		$sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
		. 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

		$result = $db->prepare($sql);
		$result->bindParam(':user_name', $userName, PDO::PARAM_STR);
		$result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
		$result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
		$result->bindParam(':user_id', $userId, PDO::PARAM_STR);
		$result->bindParam(':products', $products, PDO::PARAM_STR);

		return $result->execute();

	}

	/**
	 * Возвращает список заказов
	 * @return array <p>Список заказов</p>
	 */
	public static function getOrderList() {

		// Соединение с БД
		$db = Db::getConnection();

		// Получение и возврат результатов
		$result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
		$orderList = array();
		$i = 0;
		while ($row = $result->fetch()) {
			$orderList[$i]['id'] = $row['id'];
			$orderList[$i]['user_name'] = $row['user_name'];
			$orderList[$i]['user_phone'] = $row['user_phone'];
			$orderList[$i]['date'] = $row['date'];
			$orderList[$i]['status'] = $row['status'];
			$i++;
		}
		return $orderList;
	}

	/**
	 * Возвращает текстовое послание статуса для заказа :<br />
	 * <i>1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт</i>
	 * @param integer $status <p>Статус</p>
	 * @return string <p>Текстовое послание</p>
	 */
	public static function getStatusText($status) {

		switch ($status) {
			case '1':
				return 'New order';
				break;
			case '2':
				return 'In processing';
				break;
			case '3':
				return 'Delivered';
				break;
			case '4':
				return 'Closed';
				break;
		}
	}

	/**
	 * Возвращает заказ с указанным id
	 * @param integer $id <p>$id</p>
	 * @return array <p>Массив с информацией о заказе</p>
	 */
	public static function getOrderById($id) {

		// Соединение с БД
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = 'SELECT * FROM product_order WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		// Указываем, что хотим получить данные в виде массива
		$result->setFetchMode(PDO::FETCH_ASSOC);

		// Выполняем запрос
		$result->execute();

		// Возвращаем данные
		return $result->fetch();
	}

	/**
	 * Удаляет заказ с заданным id
	 * @param integer $id <p>id заказа</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function deleteOrderById($id) {

		// Соединение с БД
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql ='DELETE FROM product_order WHERE id = :id';

		// Получение и возврат результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}

	/**
	 * Редактирует заказ с заданным id
	 * @param integer $id <p>id товара</p>
	 * @param string $userName <p>Имя клиента</p>
	 * @param string $userPhone <p>Телефон клиента</p>
	 * @param string $userComment <p>Комментарий клиента</p>
	 * @param string $date <p>Дата заказа</p>
	 * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status) {

		// Соединение с БД
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = "UPDATE product_order
			SET
				user_name = :user_name,
				user_phone = :user_phone,
				user_comment = :user_comment,
				date = :date,
				status = :status
			WHERE id = :id";

		// Получение и возврат результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':user_name', $userName, PDO::PARAM_STR);
		$result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
		$result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
		$result->bindParam(':date', $date, PDO::PARAM_STR);
		$result->bindParam(':status', $status, PDO::PARAM_INT);
		return $result->execute();
	}

}