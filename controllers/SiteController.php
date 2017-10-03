<?php 

class SiteController {

	public function actionIndex() {

		// Список категорий для левого меню
		$categories = Category::getCategoriesList();

		// Список последних товаров
		$latestProducts = Product::getLatestProducts(3);

		// Список товаров для слайдера
		$sliderProducts = Product::getRecommendedProducts();

		require_once(ROOT .  '/views/site/index.php');

		return true;
	}
}