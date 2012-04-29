<?php
	session_start();
	chdir('..');
	require_once('api/Admin.php');
	$admin = new Admin();
	$admin->cart->add_item($admin->request->get('variant', 'integer'), $admin->request->get('amount', 'integer'));
	$cart = $admin->cart->get_cart();
	$admin->design->assign('cart', $cart);
	
	$currencies = $admin->money->get_currencies(array('enabled'=>1));
	if(isset($_SESSION['currency_id']))
		$currency = $admin->money->get_currency($_SESSION['currency_id']);
	else
		$currency = reset($currencies);

	$admin->design->assign('currency',	$currency);
	
	$result = $admin->design->fetch('cart_informer.tpl');
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		
	print json_encode($result);
