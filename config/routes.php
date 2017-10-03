<?php

return array(
	// Товар
	'product/([0-9]+)' => 'product/view/$1',		// actionView in ProductController		

	// Каталог
	'catalog' => 'catalog/index',		// actionIndex in CatalogController

	// Категория товаров
	'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',		// actionCategory in CatalogController
	'category/([0-9]+)' => 'catalog/category/$1',		// actionCategory in CatalogController

	// Корзина
	'cart/checkout' => 'cart/checkout',		// actionCheckout in CartController
	'cart/add/([0-9]+)' => 'cart/add/$1',		// actionAdd in CartController
	'cart/delete/([0-9]+)' => 'cart/delete/$1',		// actionDelete in CartController
	'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',		// actionAddAjax in CartControler
	'cart' => 'cart/index',		// actionIndex in CartController

	// Пользователь
	'user/register' => 'user/register',		// actionRegister in UserController
	'user/login' => 'user/login',		// actionLogin in UserController
	'user/logout' => 'user/logout',		// actionLogout in UserController		
	'cabinet/edit' => 'cabinet/edit',		// actionEdit in CabinetController
	'cabinet' => 'cabinet/index',		// actionIndex in CabinetController

	// Управление товарами
	'admin/product/create' => 'adminProduct/create',		// actionCreate in AdminProductController
	'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',		// actionUpdate in AdminProductController
	'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',		// actionDelete in AdminProductController
	'admin/product' => 'adminProduct/index',		// actionIndex in AdminProductController

	// Управление категриями
	'admin/category/create' => 'adminCategory/create',		// actionCreate in AdminCategryContrroller
	'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',		// actionUpdate in AdminCategoryController
	'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',		// actionDelete in AdminCategoryController
	'admin/category' => 'adminCategory/index',		// actionIndex in AdminCategoryController
	
	// Управление заказами
	'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',		// actionUpdate in AdminOrderController
	'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',		// actionDelete in AdminOrderController
	'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',		// actionView in AdminOrderController
	'admin/order' => 'adminOrder/index',		// actionIndex in AdminOrderController
	
	// Админпанель
	'admin' => 'admin/index',		// actionIndex in AdminController

	'' => 'site/index',			// actionIndex in SiteController

	);