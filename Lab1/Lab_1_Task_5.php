<?php
$tmp = 0;
$Flag = '';
foreach ($_GET as $expression) {
    if (strlen($expression) > $tmp){
       $tmp = strlen($expression);
    }
}
foreach ($_GET as $expression) {
    if (strlen($expression)==$tmp){
        echo $expression . "<br/>";
    }
}
echo $tmp;

