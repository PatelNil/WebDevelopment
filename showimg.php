<?php

$dir = 'images';
$file = scandir($dir);
print_r($file);
print "<img src='".$file[4]."'><Br>"
?>