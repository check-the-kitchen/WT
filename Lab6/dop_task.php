<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>PHP - Файловый менеджер</title>
    <style>
        #wrap{
            width:400px;
            height:100%;
            display:block;
            margin:0 auto;
        }
        h2{
            text-align:center;
        }
    </style>
</head>
<body>
<div id="wrap">
    <h2>Файловый менеджер</h2>
    <form enctype="multipart/form-data" method="post" action="uploads.php">
        <p>Загрузить файлы на сервер</p>
        <p><input type="file" name="files">
            <input type="submit" value="Отправить" name="upload"></p>
    </form>

    <form  method="post" action="preview.php">
        <p>Просмотреть список загруженных файлов</p>
            <input type="submit" value="Просмотреть список" name="preview"></p>
    </form>
</div>
</body>
</html>

