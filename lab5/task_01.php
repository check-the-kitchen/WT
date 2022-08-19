<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lab 5</title>
    <?php
        $host = 'localhost';
        $name = 'root';
        $password = 'kacha22EV!';
        $database = 'Contacts';
    ?>
</head>
<body>
    <?php
        $link = mysqli_connect($host, $name, $password, $database);
        if ($link == false){
            echo "Error! Cannot connect to MySQL database", "<br>" ;
        }
        $sql_request = "SET CHARACTER SET 'UTF8'";
        $result = mysqli_query($link, $sql_request);
        $sql_request = "SET NAMES 'UTF8'";
        $result = mysqli_query($link, $sql_request);

        $sql_request = 'SELECT * FROM Users';
        $result = mysqli_query($link, $sql_request);
        echo '<table border="1">';
        echo '<caption>','Таблица Users','</caption>';
        echo '<tr>';
        echo '<td align="center">','id','</td>';
        echo '<td align="center">','name','</td>';
        echo '<td align="center">','shortName','</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>',$row['id'],'</td>';
            echo '<td>',$row['name'],'</td>';
            echo '<td>',$row['shortName'],'</td>';
            echo '</tr>';
        }
        echo '</table>';

        $sql_request = 'SELECT * FROM Clients';
        $result = mysqli_query($link, $sql_request);
        echo '<table border="1">';
        echo '<caption>','Таблица Clients','</caption>';
        echo '<tr>';
        echo '<td align="center">','id','</td>';
        echo '<td align="center">','name','</td>';
        echo '<td align="center">','email','</td>';
        echo '<td align="center">','idPartner','</td>';
        echo '<td align="center">','phone','</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>',$row['id'],'</td>';
            echo '<td>',$row['name'],'</td>';
            echo '<td>',$row['email'],'</td>';
            echo '<td>',$row['idPartner'],'</td>';
            echo '<td>',$row['phone'],'</td>';
            echo '</tr>';
        }
        echo '</table>';

        $sql_request = 'SELECT * FROM Clients';
        $result = mysqli_query($link, $sql_request);
        echo '<table border="1">';
        echo '<caption>','Таблица Сотрудники','</caption>';
        echo '<tr>';
        echo '<td align="center">','id','</td>';
        echo '<td align="center">','name','</td>';
        echo '<td align="center">','email','</td>';
        echo '<td align="center">','workplace','</td>';
        echo '<td align="center">','phone','</td>';
        echo '</tr>';

        while ($row = mysqli_fetch_assoc($result)){
            $sql_users = 'SELECT * FROM Users WHERE id = ' .$row['idPartner'];
            $result_users = mysqli_query($link, $sql_users);
            $row_users = mysqli_fetch_assoc($result_users);
            echo '<tr>';
            echo '<td>',$row['id'],'</td>';
            echo '<td>',$row['name'],'</td>';
            echo '<td>',$row['email'],'</td>';
            echo '<td>',$row_users['name'],'</td>';
            echo '<td>',$row['phone'],'</td>';
            echo '</tr>';
        }

    ?>

</body>
</html>
