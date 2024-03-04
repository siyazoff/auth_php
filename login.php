<?php
session_start();
require_once("db.php");

$login = $_POST["login"];
$password = $_POST["password"];
$surname = $_POST["surname"];

if (empty($login) || empty($password)) {
    echo "Заполните все поля!";
} else {
    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Добро пожаловать! " . $row["login"];
            $_SESSION['loggedUser'] = $login;
            header('Location: http://localhost:8888/project_php/office.php');
            exit();
        }
    } else {
        echo "Нет такого пользователя!";
    }
}