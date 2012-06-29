<?php

set_time_limit(0);
$mebel = mysql_connect("localhost", "pcm", "jouQ1dzE");

if (!$mebel) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("mebel", $mebel)) {
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
        WHERE lang = 'ru' AND p_1 = 1
        ORDER BY `sort` ASC 
        ;";

$result = mysql_query($sql);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

while ($row = mysql_fetch_assoc($result)) {
    $sql = "SELECT * 
        FROM img
        WHERE img.interface =  'catalog'
        AND img.link = " . $row['id'] . "
        ORDER BY `sort` ASC 
        ;";
    $images = mysql_query($sql);
    if (mysql_num_rows($images) == 0) {
        if (!array_key_exists($row['pid'], $categoryByCategoryID)) {
            $categoryByCategoryID[$row['pid']] = array();
        }
        $categoryByCategoryID[$row['pid']][] = $row;
    } else {
        $row['images'] = array();
        while ($img = mysql_fetch_assoc($images)) {
            $row['images'][] = $img;
        }
        if (!array_key_exists($row['pid'], $productsByCategoryID)) {
            $productsByCategoryID[$row['pid']] = array();
        }
        $productsByCategoryID[$row['pid']][] = $row;
    }
    mysql_free_result($images);
}

mysql_free_result($result);
mysql_close($mebel);

$pcm = mysql_connect("localhost", "pcm", "jouQ1dzE");
if (!$pcm) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("pcm", $pcm)) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}
mysql_query('SET NAMES utf8');

function create_catalog($categories) {
    global $categoryByCategoryID;
    foreach ($categories as $category) {
        $c = array();
        $c['id'] = $category['id'];
        $c['parent_id'] = $category['pid'];
        $c['name'] = $category['p_2'];
        $c['url'] = preg_replace("/[\s]+/ui", '_', $c['name']);
        $c['url'] = strtolower(preg_replace("/[^0-9a-zа-я_]+/ui", '', $c['url']));
        $c['position'] = (int) $category['sort'];
        $c['description'] = $category['p_5'];
        $c['image'] = $category['p_14'];
        $c['visible'] = 1;
        $c['external_id'] = '';

        $c['meta_title'] = '';
        $c['meta_keywords'] = '';
        $c['meta_description'] = '';

        if ($c['image']) {
            $url = 'http://pcmebel.com.ua/phpthumb/phpThumb.php?src=/files/catalog/' . $c['image'] . '&w=145&h=100&zc=1';
            $img = dirname(__DIR__) . '/files/categories/' . $c['image'];
            file_put_contents($img, file_get_contents($url));
        }

        $fields = array();
        $values = array();
        foreach ($c as $f => $v) {
            $fields[] = '`' . $f . '`';
            $values[] = "'" . $v . "'";
        }

        $sql = "INSERT INTO `s_categories` (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $values) . ");";
        mysql_query($sql);

        if (array_key_exists($category['id'], $categoryByCategoryID)) {
            create_catalog($categoryByCategoryID[$category['id']]);
        }
    }
}

create_catalog($categoryByCategoryID[0]);

$imagesWH = array(
    '35x35' => array('w' => 35, 'h' => 35),
    '50x50' => array('w' => 50, 'h' => 50),
    '100x100' => array('w' => 100, 'h' => 100),
    '200x200' => array('w' => 300, 'h' => 200),
    '300x300' => array('w' => 300, 'h' => 300),
    '630x630' => array('w' => 630, 'h' => 630),
    '800x600w' => array('w' => 800, 'h' => 600),
);

foreach ($productsByCategoryID as $catId => $products) {
    foreach ($products as $pr) {
        $p = array();
        $p['id'] = $pr['id'];
        $p['name'] = $pr['p_2'];
        $p['visible'] = 1;
        $p['featured'] = 0;
        $p['brand_id'] = 0;

        $p['url'] = 0;

        $p['meta_title'] = '';
        $p['meta_keywords'] = '';
        $p['meta_description'] = '';

        $p['annotation'] = '';
        $p['body'] = $pr['p_5'];

        $p['url'] = preg_replace("/[\s]+/ui", '_', $p['name']);
        $p['url'] = strtolower(preg_replace("/[^0-9a-zа-я_]+/ui", '', $p['url']));

        $c = mysql_fetch_assoc(mysql_query('SELECT * FROM s_categories WHERE id=' . $catId));

        $p['url'] = $c['url'] . '-' . $p['url'];

        $fields = array();
        $values = array();
        foreach ($p as $f => $v) {
            $fields[] = '`' . $f . '`';
            $values[] = "'" . $v . "'";
        }

        $sql = "INSERT INTO `s_products` (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $values) . ");";
        mysql_query($sql);

        $sql = "INSERT INTO `s_products_categories` (`product_id`, `category_id`, `position`) VALUES ('" . $pr['id'] . "', '" . $catId . "', '" . ((int) $pr['sort']) . "');";
        mysql_query($sql);

        $sql = "INSERT INTO `pcm`.`s_variants` (`id`, `product_id`, `sku`, `name`, `price`, `compare_price`, `stock`, `position`, `attachment`, `external_id`) VALUES (NULL, '" . $pr['id'] . "', '', '', '0.00', NULL, NULL, '', '', '');";
        mysql_query($sql);

        foreach ($pr['images'] as $img) {
            foreach ($imagesWH as $name => $wh) {
                $url = 'http://pcmebel.com.ua/phpthumb/phpThumb.php?src=/files/pimg/' . $img['name'] . '&w=' . $wh['w'] . '&h=' . $wh['h'] . '&zc=1';
                $path_parts = pathinfo($img['name']);
                $im = dirname(__DIR__) . '/files/products/' . $path_parts['filename'] . '.' . $name . '.' . $path_parts['extension'];
                file_put_contents($im, file_get_contents($url));
            }
//            $url = 'http://pcmebel.com.ua/phpthumb/phpThumb.php?src=/files/pimg/' . $img['name'];
//            $im = dirname(__DIR__) . '/files/products/' . $img['name'];
//            file_put_contents($im, file_get_contents($url));

            $sql = "INSERT INTO  `pcm`.`s_images` (
                    `name` ,
                    `product_id` ,
                    `filename` ,
                    `position`
                )
                VALUES ('" . $img['alt'] . "',  '" . $pr['id'] . "',  '" . $img['name'] . "',  '" . ((int) $img['sort']) . "');";
            mysql_query($sql);
        }
    }
}

mysql_close($pcm);