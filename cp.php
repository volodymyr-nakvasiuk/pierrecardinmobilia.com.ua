<?php

set_time_limit(0);

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

function translitIt($str) 
{
    $tr = array(
        "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
        "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
        "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
        "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
        "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
        "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
        "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya", 
        " "=> "_", "."=> "", "/"=> "_"
    );
    return strtr($str,$tr);
}

$sql = "SELECT * 
           FROM  `s_products`
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
    $urlstr = translitIt($row['url']);
    $urlstr = preg_replace('/[^A-Za-z0-9_\-]/', '', $urlstr);
echo $row['url'].' - '.$urlstr.'</br>';
    mysql_query("UPDATE  `s_products` SET  `url` =  '".$urlstr."' WHERE  `id` =".$row['id'].";");
}

mysql_free_result($result);
mysql_close($pcm);