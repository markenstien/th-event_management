<?php
	
	$routes = [];

	$controller = '/UserController';
	$routes['user'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'profile' => $controller.'/profile',
		'sendAuth' => $controller.'/sendAuth',
		'register' => $controller.'/register',
		'verification' => $controller.'/verification'
	];

	$controller = '/AuthController';
	$routes['auth'] = [
		'login' => $controller.'/login',
		'register' => $controller.'/register',
		'logout' => $controller.'/logout',
	];

	$controller = '/ServiceController';
	$routes['service'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];

	$controller = '/ServiceBundleController';
	$routes['service-bundle'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'removeCustomPrice' => $controller.'/removeCustomPrice'
	];

	$controller = '/ServiceBundleItemController';
	$routes['service-bundle-item'] = [
		'index' => $controller.'/index',
		'add' => $controller.'/add',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];

	$controller = '/ServiceCartController';
	$routes['service-cart'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'add' => $controller.'/add',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'destroy-cart' => $controller.'/destroyCart'
	];


	$controller = '/AppointmentController';
	$routes['appointment'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'createWithBill' => $controller.'/createWithBill',
		'edit' => $controller.'/edit',
		'add' => $controller.'/add',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'addPayment' => $controller.'/addPayment',
		'update-payment' => $controller.'/updatePayment',
		'approve' => $controller.'/approve',
		'cancel' => $controller.'/cancel',
	];

	$controller = '/ContactController';
	$routes['contact'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'edit' => $controller.'/edit',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
	];

	$controller = '/MessageController';
	$routes['message'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'edit' => $controller.'/edit',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'send'   => $controller.'/send'
	];

	

	$controller = '/BillController';
	$routes['bill'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'edit' => $controller.'/edit',
		'add' => $controller.'/add',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'fetchFrame'   => $controller.'/fetchFrame',
		'payInCash'    => $controller.'/payInCash'
	];

	$controller = '/PaymentController';
	$routes['payment'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'edit' => $controller.'/edit',
		'add' => $controller.'/add',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'approve' => $controller.'/approve',
		'decline' => $controller.'/decline',
	];
	

	$controller = '/SpecialtyController';
	$routes['specialty'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];
	
	$controller = '/CategoryController';
	$routes['category'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];

	$controller = '/SessionController';
	$routes['session'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];
	
	$controller = '/AttachmentController';
	$routes['attachment'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'download' => $controller.'/download',
		'show'   => $controller.'/show'
	];

	$controller = '/ScheduleSettingController';
	$routes['schedule'] = [
		'index' => $controller.'/index',
		'update' => $controller.'/update'
	];

	$controller = '/DoctorSpecializationController';
	$routes['doc-special'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'download' => $controller.'/download',
		'show'   => $controller.'/show'
	];

	$controller = '/HomeController';
	$routes['home'] = [
		'index' => $controller.'/index',
		'about' => $controller.'/about',
		'portfolio' => $controller.'/portfolio',
		'contact' => $controller.'/contact',
		'book-event' => $controller.'/bookEvent',
	];

	$controller = '/DashboardController';
	$routes['dashboard'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'edit' => $controller.'/edit',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
	];

	return $routes;
?>