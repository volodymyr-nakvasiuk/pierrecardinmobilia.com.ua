<?php


chdir('..');
require_once('api/Admin.php');

$filename = $_GET['file'];
$token = $_GET['token'];

$filename = str_replace('%2F', '/', $filename);

//if(substr($filename, 0, 6) == 'http:/')
//	$filename = 'http://'.substr($filename, 6);


$admin = new Admin();

if(!$admin->config->check_token($filename, $token))
	exit('bad token');		

$resized_filename =  $admin->image->resize($filename);
//if(is_readable($resized_filename))
//	header('Location: '.$_SERVER['REQUEST_URI']);

if(is_readable($resized_filename))
{
	header('Content-type: image');
	print file_get_contents($resized_filename);
}

