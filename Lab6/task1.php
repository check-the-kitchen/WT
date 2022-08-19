<?php
    if (isset($_POST['colorBackground'])) {
        setcookie('background', $_POST['colorBackground'], time()+120);
        header("Refresh: 0");
    }

    if (isset($_POST['colorFont'])) {
        setcookie('color_font', $_POST['colorFont'], time()+120);
        header("Refresh: 0");
    }

    if (isset($_POST['colorHead'])) {
        setcookie('color_head', $_POST['colorHead'], time()+120);
        header("Refresh: 0");
    }

    if (isset($_POST['sizeFont'])) {
        setcookie('size_font', $_POST['sizeFont'], time()+120);
        header("Refresh: 0");
    }

    if (isset($_POST['sizeFont'])) {
        setcookie('size_font_head', $_POST['sizeFontHead'], time()+120);
        header("Refresh: 0");
    }

    if (isset($_COOKIE['background'])) {
        $colorBackground = $_COOKIE['background'];
        echo "Cookies are installed";
    }

    if (isset($_COOKIE['color_font'])) {
        $colorFont = $_COOKIE['color_font'];
    }

    if (isset($_COOKIE['color_head'])) {
        $colorHead = $_COOKIE['color_head'];
    }

    if (isset($_COOKIE['size_font'])) {
        $sizeFont = $_COOKIE['size_font'];
    }

    if (isset($_COOKIE['size_font_head'])) {
        $sizeFontHead = $_COOKIE['size_font_head'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check_color</title>

    <style>
        body {
            background-color: <?php echo $colorBackground ?>;
        }

        .text {
            color: <?php echo $colorFont ?>;
            font-size: <?php echo $sizeFont ?>;
        }

        .head {
            color: <?php echo $colorHead ?>;
            font-size: <?php echo $sizeFontHead ?>;
        }
    </style>
</head>

<body>

<div class="head">
    <h1>Who said Berlin was all about currywurst?</h1>
</div>

<div class="text">
    <p>Berlin by Food shows you the other Berlin – the mouth-watering falafels, hummus that rivals the very best in the Middle East, gözleme a Turkish mama would be proud of, cheese that even a Frenchman wouldn't turn his nose up at, pizza a discerning Naples bambino would happily wolf down…
       If your appetite is whetted, check out which tour might take your fancy, fill out the contact form or send an email so we can make an appointment. Tours are privately organised and tailor-made to suit most tastes. Numbers are kept low and there are no megaphones!
       A tour costs 70 euros (incl. 19% VAT) a head.
    </p>
</div>

    <form action="" method="POST">
        <label>Color background: <input type="color" name="colorBackground" value="<?php if (isset($_COOKIE['background'])) {
            echo $_COOKIE['background'];
        } else {
            echo "#ffffff";
        }  ?>"></label><br>

        <label>Color head: <input type="color" name="colorHead" value="<?php if (isset($_COOKIE['color_head'])) {
            echo $_COOKIE['color_head'];
        } else {
            echo "#000000";
        }  ?>"></label><br>

        <label>Size font head: <input type="range" name="sizeFontHead" min="20" max="100" value="<?php if (isset($_COOKIE['size_font_head'])) {
                echo $_COOKIE['size_font_head'];
            } else {
                echo "20";
            }  ?>" step="5"> </label><br>

        <label>Color font: <input type="color" name="colorFont" value="<?php if (isset($_COOKIE['color_font'])) {
            echo $_COOKIE['color_font'];
        } else {
            echo "#000000";
        }  ?>"></label><br>

        <label>Size font: <input type="range" name="sizeFont" min="15" max="100" value="<?php if (isset($_COOKIE['size_font'])) {
            echo $_COOKIE['size_font'];
        } else {
            echo "15";
        }  ?>" step="2"> </label>

        <br><br><input type="submit" value="Send!">
</form>
</body>
</html>