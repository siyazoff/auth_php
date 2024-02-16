<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <form action="register.php" method="post">
            <input type="text" placeholder="login" name="login">
            <input type="text" placeholder="password" name="password">
            <input type="text" placeholder="repeat password" name="repeatpass">
            <input type="email" placeholder="email" name="email">
            <button type="submit">Зарегестрироваться</button>
        </form>

        <form action="login.php" method="post">
            <input type="text" placeholder="login" name="login">
            <input type="password" placeholder="password" name="password">
            <button type="submit">Войти</button>
        </form>
    </main>
</body>

</html>