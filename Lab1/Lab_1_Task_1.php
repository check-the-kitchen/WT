<?php
$pos = '';
foreach($_GET as $element) {
    if (is_numeric($element)) {
        if (strpos($element,".")) {
            echo $element . "- is float <br/>";
        } else {
            echo $element . "- is integer <br/>";
        }
    } else {
        echo $element . "- is string <br/>";
    }
}