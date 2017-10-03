<?php

class CabinetController {
	public function actionIndex() {

		$userId = User::checkLogged();

		//Получаем информацию о пользователе из БД
		$user = User::getUserById($userId);

	require_once(ROOT . '/views/cabinet/index.php');

	return true;
	}

	public function actionEdit() {
		// Получаем индетификатор пользователя из сессии
		$userId = User::checkLogged();

		// Получаем информацию о пользователе из БД
		$user = User::getUserById($userId);

		$name = $user['name'];
		$password = $user['password'];

		$result = false;

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$password = $_POST['password'];

			$errors = false;

			if (!User::checkName($name)) {
				$errors[] = 'The name can not be shorter than 2 characters';
			}

			if (!User::checkPassword($password)) {
				$errors[] = 'The password can not be shorter than 6 characters';
			}

			if ($errors == false) {
				$result = User::edit($userId, $name, $password);
			}
		}

		require_once(ROOT . '/views/cabinet/edit.php');

		return true;
	}
}