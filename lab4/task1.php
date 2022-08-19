<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lab 4</title>
    </head>
    <body>
    <?php



        require ("/var/www/lab4/FormBuilder.php");
        require ("/var/www/lab4/SafeFormBuilder.php");
        $formBuilder = new FormBuilder('task1.php', 'Отправить', FormBuilder::METHOD_POST);
        $formBuilder->addTextField('firstName', 'Имя', 'Иван', null);
        $formBuilder->addTextField('secondName', 'Фамилия', 'Иванов', null);
        $formBuilder->addRadioGroup('radioGroup', ['male'=>['choiceMale','Мужчина', false], 'female'=>['choiceFemale','Женщина', false], 'midmale'=>['choicemidmale','Что-то среднее', false]]);
        $formBuilder->addSelectBox('education', ['high'=>['Высшее',false], 'middle'=>['Среднее',true]], 'Образование');
        $formBuilder->addCheckBox('animals', ['cat'=>['Кошка',false], 'dog'=>['Собака',false], 'parrot'=>['Попугай',false]]);
        $formBuilder->getForm();

        $safeform = new SafeFormBuilder('test.php', 'Отправить', FormBuilder::METHOD_POST);
        $safeform->addTextField('firstName', 'Имя', 'Иван', null);
        $safeform->addTextField('secondName', 'Фамилия', 'Иванов', null);
        $safeform->addRadioGroup('radioGroup', ['male'=>['choiceMale','Мужчина', false], 'female'=>['choiceFemale','Женщина', false], 'midmale'=>['choicemidmale','Что-то среднее', false]]);
        $safeform->addSelectBox('education', ['high'=>['Высшее',false], 'middle'=>['Среднее',true]], 'Образование');
        $safeform->addCheckBox('animals', ['cat'=>['Кошка',false], 'dog'=>['Собака',false], 'parrot'=>['Попугай',false]]);
        $formBuilder->getForm();
    ?>
    </body>
</html>
