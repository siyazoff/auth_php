<?php
session_start();
require_once("db.php");

if (!isset($_SESSION['loggedUser'])) {
    // Пользователь не авторизован
    $_SESSION['errorMessage'] = "Пожалуйста, войдите в систему.";
    header('Location: error_page.php'); // Перенаправление на страницу с ошибкой
    exit;
}

$login = $_SESSION['loggedUser'];
$newLogin = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? ''; // Не забудьте про хеширование
$photoPath = "";

// Обработка загрузки фото
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);
    // Добавьте необходимые проверки файла
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        $photoPath = $targetFile;
    }
}

$sql = "UPDATE users SET ";
$sqlParts = [];

if (!empty($newLogin)) {
    $sqlParts[] = "login = '$newLogin'";
    $_SESSION['loggedUser'] = $newLogin; // Обновляем имя пользователя в сессии
}


if (!empty($email)) {
    $sqlParts[] = "email = '$email'";
}
if (!empty($password)) {
    $sqlParts[] = "password = '$password'";
}
if (!empty($photoPath)) {
    $sqlParts[] = "photo_path = '$photoPath'";
}

if (empty($sqlParts)) {
    $_SESSION['updateMessage'] = "Нет данных для обновления.";
    header('Location: office.php');
    exit;
}

$sql .= implode(", ", $sqlParts);
$sql .= " WHERE login = '$login'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['updateMessage'] = "Профиль успешно обновлен.";
} else {
    $_SESSION['errorMessage'] = "Ошибка обновления профиля: " . $conn->error;
    header('Location: error_page.php'); // Перенаправление на страницу с ошибкой
    exit;
}

header('Location: office.php'); // Возвращаем пользователя в личный кабинет
