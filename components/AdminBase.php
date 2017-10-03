<?php

/**
 * Абстрактный класс AdminBase сожержит общую логику для контроллеров, которые
 * используются в панели администратора
 */
abstract class AdminBase {

	/**
	 * Метод, который проверяет пользователя на то, является ли он администратором
	 * @return boolen
	 */
	public static function checkAdmin() {

		// Проверяем, авторизован ли пользователь. Если нет, то будет переадресован
		$userId = User::checkLogged();

		// Получаем информацию о текущем пользователе
		$user = User::getUserById($userId);

		// Если роль текущего пользователя "admin", пускаем его в админпанель
		if ($user['role'] == 'admin') {
			
			return true;
		}

		// Иначе завершаем работу с сообщегием о закрытом доступе
		die('Access denied');

	}

}