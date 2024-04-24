<?php
$name = trim(strip_tags($_POST["name"]));
$surname = trim(strip_tags($_POST["surname"]));
$tel = trim(strip_tags($_POST["tel"]));
$email = trim(strip_tags($_POST["E-mail"]));
$password = trim(strip_tags($_POST["password"]));

$dbhost = "localhost"; // Имя хоста БД
$dbusername = "root"; // Пользователь БД
$dbpass = ""; // Пароль к базе

$dbconnect = @mysql_connect ($dbhost, $dbusername, $dbpass);
if (!$dbconnect) { echo "Не могу подключиться к серверу базы данных!"; }

if(@mysql_select_db(users)) { echo" Подключение к базе $dbname установлено! <br/>"; }
else die ("Не могу подключиться к базе данных $dbname!");

$qr_result = mysql_query('select еmail from users');
$n = 0;

while ($data = mysql_fetch_array($qr_result)) {
    if ($email==$data['еmail']) {
        $n++;

        echo '<script>window.location.href = "registraciya.html";
        alert("Данная почта уже используеться")</script>';
        define("name", $data['name']);
        break;
    }
}
if ($n==0){
    $insert_sql = "INSERT INTO users (name, surname, phone, email, password)". "VALUES('{$name}', '{$surname}', '{$tel}', '{$email}', '{$password}')";
    mysql_query($insert_sql);
    echo '<script>window.location.href = "index.html"</script>';
}

?>