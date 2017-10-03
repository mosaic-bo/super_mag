<?php

/**
 * Контроллер AdminController
 * Главная страница в админпанели
 */

class AdminController extends AdminBase {
	
	/**
	 * Action для стартовой страницы "Панели администратора"
	 */

	public function actionIndex() {

		// Проверка доступа
		self::checkAdmin();

		// Подключаем вид
		require_once(ROOT . '/views/admin/index.php');
		return true;
	}
}