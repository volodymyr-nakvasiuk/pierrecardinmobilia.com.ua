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
$content = $admin->request->post('content');
$style = $admin->request->post('style');
$theme = $admin->request->post('theme', 'string');

if(pathinfo($style, PATHINFO_EXTENSION) != 'css')
	exit();

$file = $admin->config->root_dir.'design/'.$theme.'/css/'.$style;
if(is_file($file) && is_writable($file) && !is_file($admin->config->root_dir.'design/'.$theme.'/locked'))
	file_put_contents($file, $content);

$result= true;
header("Content-type: application/json; charset=UTF-8");
header("Cache-Control: must-revalidate");
header("Pragma: no-cache");
header("Expires: -1");		
$json = json_encode($result);
print $json;