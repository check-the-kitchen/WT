<?php
$MyArray = array (array (1,1,1,1,1),
                    array (2,2,2,2,2),
                    array (3,3,3,3,3),
                    array(4,4,4,4,4),
                    array(5,5,5,5,5)
                    );
for ($i=0;$i<5;$i++){
    for($j=0;$j<5;$j++){
        switch ($i) {
            case 0:
                echo "<span style='background-color:red'>" . $MyArray[$i][$j] . "</span>";
                break;
            case 1:
                echo "<span style='background-color:Blue'>" . $MyArray[$i][$j] . "</span>";
                break;
            case 2:
                echo "<span style='background-color:Green'>" . $MyArray[$i][$j] . "</span>";
                break;
            case 3:
                echo "<span style='background-color:Purple'>" . $MyArray[$i][$j] . "</span>";
                break;
            case 4:
                echo "<span style='background-color:Yellow'>" . $MyArray[$i][$j] . "</span>";
                break;
        }
    }
    echo "<br/>";
}




