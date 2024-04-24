<?php

    $email = trim(strip_tags($_POST["E-mail"]));
    $password = trim(strip_tags($_POST["password"]));

    $dbhost = "localhost"; // Имя хоста БД
    $dbusername = "root"; // Пользователь БД
    $dbpass = ""; // Пароль к базе


    $dbconnect = @mysql_connect ($dbhost, $dbusername, $dbpass);
    if (!$dbconnect) { echo "Не могу подключиться к серверу базы данных!"; }

    if(@mysql_select_db(users)) { echo" Подключение к базе $dbname установлено! <br/>"; }
    else die ("Не могу подключиться к базе данных $dbname!");

    $qr_result = mysql_query('select * from users');

    while ($data = mysql_fetch_array($qr_result)) {
        if( ($email=$data['email'])and($password=$data['password']))
        {
    	   echo '<script>window.location.href = "index.html"</script>';
    	   break;
        }
        else echo '<script>window.location.href = "vhod.html";
            alert("Вы где-то врете X)"); </script>';
        }
?>