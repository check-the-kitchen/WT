<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lab 4</title>
</head>
<style>
    .en {
       color: blue;
    }
    .ru {
        color: red;
    }
    .num {
        color: green;
    }
</style>
<body>
    <?php
    $regEn = '/\b[a-zA-Z]+\b/';
    $regRu = '/\b[а-яёА-ЯЁ]+\b/u';
    $regNum = '/\b[0-9]+\b/'; //TODO: дать пизды Сане
    $str = $_POST['inputText'];
    preg_match_all($regEn,$str, $matches);
    echo '<p class="en">';
    for ($i=0;$i<count($matches[0]); $i++){
        echo $matches[0][$i], ' ';
    }
    echo '</p>';


    preg_match_all($regRu,$str, $matches1);
    echo '<p class="ru">';
    for ($i=0;$i<count($matches1[0]); $i++){
        echo $matches1[0][$i], ' ';
    }
    echo '</p>';


    preg_match_all($regNum,$str, $matches2);
    echo '<p class="num">';
    for ($i=0;$i<count($matches2[0]); $i++){
        echo $matches2[0][$i], ' ';
    }
    echo '</p>';

    ?>
</body>
</html>
