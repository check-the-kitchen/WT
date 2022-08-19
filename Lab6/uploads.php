<?php

//Устанавливаем кодировку и вывод всех ошибок
header('Content-Type: text/html; charset=UTF-8');

//Каталог загрузки картинок
$uploadDir = './loads';

//Вывод ошибок
$err = array();

//Коды ошибок загрузки файла
$errUpload = array(
    0 => 'Ошибок не возникло, файл был успешно загружен на сервер. ',
    1 => 'Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini.',
    2 => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.',
    3 => 'Загружаемый файл был получен только частично.',
    4 => 'Файл не был загружен.',
    6 => 'Отсутствует временная папка.'
);

//Определяем типы файлов для загрузки
$fileTypes = array(
    'jpg' => 'loads/jpeg',
    'png' => 'loads/png',
    'gif' => 'loads/gif',
    'txt' => 'loads/txt'
);

//Если нажата кнопка загрузить
if(isset($_POST['upload']))
{
    //Проверяем пустые данные или нет
    if(!empty($_FILES))
    {
        //Проверяем на ошибки
        if($_FILES['files']['error'] > 0)
            $err[] = $errUpload[$_FILES['files']['error']];

        //Проверям тип файла для загрузки
        if(!in_array($_FILES['files']['type'], $fileTypes))
            $err[] = 'Данный тип файла <b>'. $_FILES['files']['type'] .'</b> не подходит для загрузки!';

        //Если нет ошибок то грузим файл
        if(empty($err))
        {
            $type = pathinfo($_FILES['files']['name']);
            $name = $uploadDir .'/'. uniqid('files_') .'.'. $type['extension'];
            move_uploaded_file($_FILES['files']['tmp_name'],$name);

            //Сбрасываем POST параметры
            header('Location: http://'. $_SERVER['HTTP_HOST'] .'/Lab6/uploads.php?name='. $name);
            exit;
        }
        else
            echo implode('<br>', $err);
    }

}

//Сообщение об успешной загрузке файла на сервер
if(isset($_GET['name']))
    echo '<h1>Файл <font color="red">'. htmlentities($_GET['name']) .'</font> успешно загружен!</h1>';

//Выводим картинки из каталога
$imgDir = array_values(array_diff(scandir($uploadDir), array('..', '.')));

for($i = 0; $i < count($imgDir); $i++)
{
    if($i % 2 == 0)
        echo '<br>'."\n";

    echo '<img src="'. $uploadDir .'/'. $imgDir[$i] .'">'."\n";
}

echo '<br /><br />'."\n";
