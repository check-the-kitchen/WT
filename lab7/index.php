<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/contacts_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap"
          rel="stylesheet">
    <title>Отправка писем</title>
</head>
<body>

<main>
    <section>
        <div class="container">
            <div class="main-block">
                <div class="contact-form">
                    <form method="post">
                        <div class="form-inner">
                            <?php
                            if (isset($_POST) && isset($_POST["btn"]))
							{							
                                $isError = false;
                                if (isset($_POST["email"])) 
								{
                                    $email = preg_split("/,/", $_POST["email"]);
                                }
                                if (isset($_POST["text"])) 
								{
                                    $text = $_POST["text"];
                                }
                                if (isset($_POST["message"])) 
								{
                                    $message = $_POST["message"];
                                }

                                $pattern = '/([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
                                foreach ($email as $item) 
								{
                                    if (!preg_match($pattern, $item))
									{
                                        $isError = true;
                                        echo "Incorrect email: ", $item, "<br>";
                                        echo '<label for="emil"><b>Email</b></label>
                                            <input type="text" placeholder="email" name="email" value="', $_POST["email"],'" required>
                                            <label for="text"><b>Тема</b></label>
                                            <input type="text" placeholder="Тема" name="text" value="', $_POST["text"],'" required>
                                            <label for="message"><b>Сообщение</b></label>
                                            <input type="text" placeholder="Сообщение" name="message" value="', $_POST["message"],'" required>';
                                        exit;
                                    }
                                }
                                include "PHPMailer.php";
                                include "SMTP.php";

                                $mail = new PHPMailer;

                                //Address to which recipient will reply
                                $mail->addReplyTo('lerka.smolova@yandex.ru', "Valeria Smolova");
                                //Send HTML or Plain Text email
                                $mail->isHTML(true);
                                $mail->CharSet = 'UTF-8';

                                $mail->isSMTP();
                                $mail->SMTPAuth = true;
                                $mail->SMTPDebug = 0;
                                $mail->Host = 'ssl://smtp.yandex.ru';
                                $mail->Port = 465;
                                $mail->Username = 'lerka.smolova@yandex.ru';
                                $mail->Password = 'xk6nbwA.NaUaiFD';
                                $mail->setFrom('lerka.smolova@yandex.ru', 'Valeria Smolova');
                                foreach ($email as $item) {
                                    $mail->addAddress($item);
                                }
                                $mail->Subject = $text;
                                $body = $message;
                                $mail->msgHTML($body);
                                if($mail->send())
								{
                                    echo "Письмо отправлено<br>";
                                    $fp = fopen('email.txt', 'w');
                                    fwrite($fp, $_POST["email"]);
                                    fclose($fp);
                                }
                                else
								{
                                    echo "Возникли проблемы при отправке, повторите попытку позже<br>";
                                }
                            }
							else
							{
                                $isError = false;
							}
                            if (!$isError)
                            {
                                
                            echo '<label for="emil"><b>Email</b></label>
                            <input type="text" placeholder="email" name="email" value="" required>
                            <label for="text"><b>Тема</b></label>
                            <input type="text" placeholder="Тема" name="text" required>
                            <label for="message"><b>Сообщение</b></label>
                            <input type="text" placeholder="Сообщение" name="message" required>';
                            } ?>
                            <button type="submit" name="btn" class="send-button">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</main>

</body>
</html>