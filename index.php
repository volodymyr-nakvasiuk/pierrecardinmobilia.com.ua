<?PHP
/**
 * Admin CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link		http://admincms.ru
 * @author 		Denis Pikusov
 *
 */
error_reporting(E_ALL); 
 
// Засекаем время
$time_start = microtime(true);

session_start();

require_once('view/IndexView.php');

$view = new IndexView();

// Если все хорошо
if(($res = $view->fetch()) !== false)
{
	// Выводим результат
	header("Content-type: text/html; charset=UTF-8");
	print $res;
}
else 
{ 
	// Иначе страница об ошибке
	header("http/1.0 404 not found");
	
	// Подменим переменную GET, чтобы вывести страницу 404
	$_GET['page_url'] = '404';
	$_GET['module'] = 'PageView';
	print $view->fetch();   
}

@list($l->domains, $l->expiration, $l->comment) = explode('#', '', 3);

$l->domains = explode(',', $l->domains);

$h = getenv("HTTP_HOST");
if(substr($h, 0, 4) == 'www.') $h = substr($h, 4);


// Отладочная информация
if(1)
{
	print "<!--\r\n";
	$time_end = microtime(true);
	$exec_time = $time_end-$time_start;
  
  	if(function_exists('memory_get_peak_usage'))
		print "memory peak usage: ".memory_get_peak_usage()." bytes\r\n";  
	print "page generation time: ".$exec_time." seconds\r\n";  
	print "-->";
}
