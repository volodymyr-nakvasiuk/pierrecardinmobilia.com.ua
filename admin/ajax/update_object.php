<?php

session_start();

chdir('../..');
require_once('api/Admin.php');

$admin = new Admin();

// Проверка сессии для защиты от xss
if(!$admin->request->check_session())
{
	trigger_error('Session expired', E_USER_WARNING);
	exit();
}

$id = intval($admin->request->post('id'));
$object = $admin->request->post('object');
$values = $admin->request->post('values');

switch ($object)
{
    case 'product':
        $result = $admin->products->update_product($id, $values);
        break;
    case 'category':
        $result = $admin->categories->update_category($id, $values);
        break;
    case 'brands':
        $result = $admin->brands->update_brand($id, $values);
        break;
    case 'feature':
        $result = $admin->features->update_feature($id, $values);
        break;
    case 'page':
        $result = $admin->pages->update_page($id, $values);
        break;
    case 'blog':
        $result = $admin->blog->update_post($id, $values);
        break;
    case 'delivery':
        $result = $admin->delivery->update_delivery($id, $values);
        break;
    case 'payment':
        $result = $admin->payment->update_payment_method($id, $values);
        break;
    case 'currency':
        $result = $admin->money->update_currency($id, $values);
        break;
    case 'comment':
        $result = $admin->comments->update_comment($id, $values);
        break;
    case 'user':
        $result = $admin->users->update_user($id, $values);
        break;
}

header("Content-type: application/json; charset=UTF-8");
header("Cache-Control: must-revalidate");
header("Pragma: no-cache");
header("Expires: -1");		
$json = json_encode($result);
print $json;