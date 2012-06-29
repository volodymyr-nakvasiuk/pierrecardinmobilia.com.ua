<?php

/**
 * Admin CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://admincms.ru
 * @author 		Denis Pikusov
 *
 * К этому скрипту обращается Liqpay в процессе оплаты
 *
 */

// Работаем в корневой директории
chdir ('../../');
require_once('api/Admin.php');
$admin = new Admin();


$xml = base64_decode($_POST['operation_xml']);
$signature = $_POST['signature'];

// Выбираем из xml нужные данные
$order_id      = intval(get_tag_val($xml, 'order_id'));
$merchant_id   = get_tag_val($xml, 'merchant_id'); 
$amount        = get_tag_val($xml, 'amount'); 
$currency_code = get_tag_val($xml, 'currency'); 
$status        = get_tag_val($xml, 'status'); 

if($status !== 'success')
	exit();

////////////////////////////////////////////////
// Выберем заказ из базы
////////////////////////////////////////////////
$order = $admin->orders->get_order(intval($order_id));
if(empty($order))
	die('Оплачиваемый заказ не найден');
 
////////////////////////////////////////////////
// Выбираем из базы соответствующий метод оплаты
////////////////////////////////////////////////
$method = $admin->payment->get_payment_method(intval($order->payment_method_id));
if(empty($method))
	die("Неизвестный метод оплаты");
	
$settings = unserialize($method->settings);
$payment_currency = $admin->money->get_currency(intval($method->currency_id));

// Проверяем контрольную подпись
$mysignature = base64_encode(sha1($settings['liqpay_sign'].$xml.$settings['liqpay_sign'],1));
if($mysignature !== $signature)
	die("bad sign");

// Нельзя оплатить уже оплаченный заказ  
if($order->paid)
	die('Этот заказ уже оплачен');

if($amount != round($admin->money->convert($order->total_price, $method->currency_id, false), 2) || $amount<=0)
	die("incorrect price");
	
if($currency_code != $payment_currency->code)
	die("incorrect currency");
	       
// Установим статус оплачен
$admin->orders->update_order(intval($order->id), array('paid'=>1));

// Отправим уведомление на email
$admin->notify->email_order_user(intval($order->id));
$admin->notify->email_order_admin(intval($order->id));

// Спишем товары  
$admin->orders->close(intval($order->id));

exit();

function get_tag_val($xml, $name)
{
	preg_match("/<$name>(.*)<\/$name>/i", $xml, $matches);
	return trim($matches[1]); 
}
