<?php
$dir  = './loads/';
//пропускаем точки
$skip = array('.', '..');
$files = scandir($dir);
foreach($files as $file) {
    if(!in_array($file, $skip))
        echo $file . '<br />';
}