</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/cferdinandi/tabby@12.0.0/dist/css/tabby-ui.min.css">

</head>

<body>
    <header class="header">
        <nav class="header__nav">
            <a class="header__logo" href="#">LOGO</a>
            <div class="header__profile">
                <?php
                session_start();
                require_once("db.php");
                $loggedInUser = $_SESSION['loggedUser'];

                $sql = "SELECT * FROM `users` WHERE `login` = '$loggedInUser'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if ($row) {
                    $userImagePath = $row['photo_path'];
                    ?>
                    <img class="header__user-img" src="<?php echo $userImagePath; ?>" alt="user">
                    <h3 class="header__user-name">
                        <?php echo $row['login']; ?>
                    </h3>
                    <?php
                } else {
                    echo 'Ошибка!';
                }
                ?>
            </div>
        </nav>
    </header>
    <main>
        <section class="section-office" id="section-office">
            <div class="container">
                <?php
                // В начале файла
                session_start();
                if (isset($_SESSION['updateMessage'])) {
                    echo "<p>" . $_SESSION['updateMessage'] . "</p>";
                    unset($_SESSION['updateMessage']); // Удаление сообщения после отображения
                }
                // Остальная часть файла
                ?>

                <form action="update_profile.php" method="post" enctype="multipart/form-data">
                    <label for="login">Имя пользователя:</label>
                    <input type="text" id="login" name="login" value="<?php echo $row['login']; ?>"><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>

                    <label for="password">Новый пароль:</label>
                    <input type="password" id="password" name="password"><br>

                    <label for="photo">Фото профиля:</label>
                    <input type="file" id="photo" name="photo"><br>

                    <input type="submit" value="Обновить профиль">
                </form>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/tabby@12.0.0/dist/js/tabby.polyfills.min.js"></script>
    <script>var tabs = new Tabby('[data-tabs]');</script>
</body>

</html>