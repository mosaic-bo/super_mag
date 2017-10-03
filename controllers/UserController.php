<?php

class UserController {

	public function actionRegister() {

		$name = '';
		$email = '';
		$password = '';
		$result = false;

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			if (!User::checkName($name)) {
				$errors[] = 'The name can not be shorter than 2 characters';
			}

			if (!User::checkEmail($email)) {
				$errors[] = 'Incorrect email';
			}

			if (!User::checkPassword($password)) {
				$errors[] = 'The password can not be shorter than 6 characters';
			}

			if (User::checkEmailExist($email)) {
				$errors[] = 'Such email already exist';
			}

			if ($errors == false) {
				$result = User::register($name, $email, $password);
			}
		}

		require_once(ROOT . '/views/user/register.php');

		return true;
	}

	public function actionLogin() {

		$email = '';
		$password = '';

		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			//Валидация полей
			if (!User::checkEmail($email)) {
				$errors[] = 'Incorrect Email';
			}

			if (!User::checkPassword($password)) {
				$errors[] = 'The password can not be shorter than 6 characters';
			}

			//Проверяем, существует ли пользователь
			$userId = User::checkUserData($email, $password);

			if ($userId == false) {
				//Если данные неправильные, показываем ошибку
				$errors[] = 'Incorrect login data';	
			} else {
				//Если данные правильные, запоминаем пользователя (сессия)
				User::auth($userId);

				//Перенаправляем пользователя в закрытую часть - кабинет
				header("Location: /cabinet/");
			}
		}

		require_once ROOT . '/views/user/login.php';

		return true;
	
	}

	/**
	 * Удаляем данные о пользователе из сессии
	 */

	public function actionLogout() {
		session_start();
		unset($_SESSION["user"]);
		header("Location: /");
	}

}