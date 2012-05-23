<pre>
<?php
$filename = '1333099010_1.200x136a.jpg?cad341447272845e62659ec5278972fc';
preg_match('/(.+)\.([0-9]*)x([0-9]*)(w|a)?\.([^\.]+)$/', $filename, $matches);
print_r($matches);