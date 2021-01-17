<?php
$name = $_POST["name"];
$email = $_POST["email"];
$tel = $_POST["phone"];


/*ЗДЕСЬ ПРОВЕРЯЕМ ЕСЛИ ХОТЯ БЫ ОДНО ИЗ ПОЛЕЙ НЕ ЗАПОЛНЕНО МЫ ВОЗВРАЩАЕМ СООБЩЕНИЕ*/
if($name=="" or $email=="" or $tel==""){
    echo "Заполните все поля";
}

else{
    $to = "shipuchka0715@mail.ru"; 
    $subject = "Письмо с обратной связи";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: <shipuchka0715@mail.ru>\r\n";


    $message .= "Имя пользователя: ".$name."\n";
    $message .= "Почта: ".$email."\n";
    $message .= "Телефон: ".$tel."\n";

    $send = mail($to, $subject, $message, $headers);

    /*ЕСЛИ ПИСЬМО ОТПРАВЛЕНО УСПЕШНО ВЫВОДИМ СООБЩЕНИЕ*/
    if ($send == "true")
    {
        echo "<p style='color: green;'>Ваше сообщение отправлено. Мы ответим вам в ближайшее время.\r\n</p>";
    }
    /*ЕСЛИ ПИСЬМО НЕ УДАЛОСЬ ОТПРАВИТЬ ВЫВОДИМ СООБЩЕНИЕ ОБ ОШИБКЕ*/
    else
    {
        echo "<p style='color: red;'>Не удалось отправить, попробуйте снова!</p>";
    }
}
?>