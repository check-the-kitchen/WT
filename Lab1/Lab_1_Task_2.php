<?php

$RowNum = (int)$_GET['Row'];

echo '<table border="1">';

echo '<tr>';

for ($i=1; $i<=$RowNum; $i++) {
    echo "<td> $i </td>";

    echo '</tr>';
}
echo '</table>';
