<?php
require_once('db.php');

$login = $_POST["login"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeatpass = $_POST["repeatpass"];
$uploadOk = 0; // Переменная для отслеживания успеха загрузки файла

// Проверка заполнения обязательных полей
if (empty($login) || empty($password) || empty($repeatpass) || empty($email)) {
    echo "Заполните все поля";
    exit; // Прекращаем выполнение скрипта
}

// Проверка на существование пользователя с таким же email
$sql = "SELECT id FROM users WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Пользователь с таким email уже существует";
    exit;
}

// Проверка совпадения паролей
if ($password != $repeatpass) {
    echo "Пароли не совпадают";
    exit;
}

// Обработка загрузки фото
if ($_FILES["photo_path"]["error"] == 0) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["photo_path"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["photo_path"]["tmp_name"]);
    if ($check !== false) {
        echo "Файл - изображение - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Файл не является изображением.";
        exit; // Файл не является изображением, прекращаем выполнение
    }

    if (!move_uploaded_file($_FILES["photo_path"]["tmp_name"], $targetFile)) {
        echo "Произошла ошибка при загрузке файла.";
        exit; // Проблема с загрузкой файла, прекращаем выполнение
    }
} else {
    $targetFile = ""; // Файл не загружен
}

// Вставляем данные пользователя в базу данных
$sql = "INSERT INTO users (login, email, password, photo_path) VALUES ('$login', '$email', '$password', '$targetFile')";
if ($conn->query($sql) === TRUE) {
    echo "Успешная регистрация";
} else {
    echo "Ошибка: " . $conn->error;
}
?>