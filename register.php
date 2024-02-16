<?php
require_once('db.php');

$login = $_POST["login"];
$password = $_POST["password"];
$repeatpass = $_POST["repeatpass"];
$email = $_POST["email"];



if (empty($login) || empty($password) || empty($repeatpass) || empty($email)) {
    echo "Заполните поля";
} else {
    if ($password != $repeatpass) {
        echo "Пароли не совпадают";
    } else {
        $sql = "INSERT INTO `users` (login,email,password) VALUES ('$login', '$email', '$password')";

        if ($conn->query($sql) == TRUE) {
            echo "Успешная регистрация";
        } else {
            echo "Ошибка: " . $conn->error;
        }

    }
}
