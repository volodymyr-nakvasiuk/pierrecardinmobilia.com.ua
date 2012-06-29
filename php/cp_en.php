<?php

set_time_limit(0);
$mebel = mysql_connect("localhost", "pcm", "jouQ1dzE");

if (!$mebel)
{
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("mebel", $mebel))
{
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}

mysql_query('SET NAMES utf8');

/// =========================

$productsByCategoryID = array();
$categoryByCategoryID = array();

$sql = "SELECT * 
        FROM catalog_info
        JOIN catalog_base ON catalog_info.id = catalog_base.id
        WHERE lang = 'en' AND p_1 = 1
        ORDER BY `sort` ASC 
        ;";

$result = mysql_query($sql);

if (!$result)
{
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0)
{
    echo "No rows found, nothing to print so am exiting";
    exit;
}

while ($row = mysql_fetch_assoc($result))
{
    $sql = "SELECT * 
        FROM img
        WHERE img.interface =  'catalog'
        AND img.link = " . $row['id'] . "
        ORDER BY `sort` ASC 
        ;";
    $images = mysql_query($sql);
    if (mysql_num_rows($images) == 0)
    {
        $categoryByCategoryID[] = $row;
    }
    else
    {
        $productsByCategoryID[] = $row;
    }
    mysql_free_result($images);
}

mysql_free_result($result);
mysql_close($mebel);

$pcm = mysql_connect("localhost", "pcm", "jouQ1dzE");
if (!$pcm)
{
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("pcm", $pcm))
{
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}
mysql_query('SET NAMES utf8');

foreach ($categoryByCategoryID as $category)
{
    $name_en = trim($category['p_2']);
    if ($name_en)
    {
        mysql_query("UPDATE `s_categories` SET `name_en`='" . $name_en . "' WHERE `id`=".$category['id']." LIMIT 1");
    }
}

foreach ($productsByCategoryID as $product)
{
    $name_en = trim($product['p_2']);
    if ($name_en)
    {
        mysql_query("UPDATE `s_products` SET `name_en`='" . $name_en . "' WHERE `id`=".$product['id']." LIMIT 1");
    }
}

mysql_close($pcm);