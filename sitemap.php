<?php

require_once('api/Admin.php');
$admin = new Admin();

header("Content-type: text/xml; charset=UTF-8");
print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
print '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

// Главная страница
$url = $admin->config->root_url;
$lastmod = date("Y-m-d");
print "\t<url>"."\n";
print "\t\t<loc>$url</loc>"."\n";
print "\t\t<lastmod>$lastmod</lastmod>"."\n";
print "\t</url>"."\n";

// Страницы
foreach($admin->pages->get_pages() as $p)
{
	if($p->visible && $p->menu_id == 1)
	{
		$url = $admin->config->root_url.'/'.esc($p->url);
		print "\t<url>"."\n";
		print "\t\t<loc>$url</loc>"."\n";
		print "\t</url>"."\n";
	}
}

// Блог
foreach($admin->blog->get_posts(array('visible'=>1)) as $p)
{
	$url = $admin->config->root_url.'/blog/'.esc($p->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	print "\t</url>"."\n";
}

// Категории
foreach($admin->categories->get_categories() as $c)
{
	if($c->visible)
	{
		$url = $admin->config->root_url.'/catalog/'.esc($c->url);
		print "\t<url>"."\n";
		print "\t\t<loc>$url</loc>"."\n";
		print "\t</url>"."\n";
	}
}

// Бренды
foreach($admin->brands->get_brands() as $b)
{
	$url = $admin->config->root_url.'/brands/'.esc($b->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	print "\t</url>"."\n";
}

// Товары
$admin->db->query("SELECT url FROM __products WHERE visible=1");
foreach($admin->db->results() as $p)
{
	$url = $admin->config->root_url.'/products/'.esc($p->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	print "\t</url>"."\n";
}

print '</urlset>'."\n";

$admin->body = $map;
return $map;

function esc($s)
{
	return(htmlspecialchars($s, ENT_QUOTES, 'UTF-8'));	
}