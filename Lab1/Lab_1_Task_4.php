<?php
$str = $_GET['Number'];
$tmp = 0;
for ($i = 0; $i < strlen($str); $i++) {
    $tmp += (int)$str[$i];
}
echo $tmp;