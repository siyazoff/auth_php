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
    <main>
        <section class="section-sign" id="section-sign">
            <div class="container">
                <ul data-tabs class="section-sign__tabs">
                    <li><a href="#register-form" data-tabby-default>Зарегестрироваться</a></li>
                    <li><a href="#login-form">Уже есть аккаунт?</a></li>
                </ul>
                <div class="section-sign__box">
                    <div class="form-wrapper" id="register-form">
                        <form action="register.php" method="post" enctype="multipart/form-data">
                            <input type="text" placeholder="Имя" name="login">
                            <input type="email" placeholder="Ваш email" name="email">
                            <input type="text" placeholder="Пароль" name="password">
                            <input type="text" placeholder="Повторите пароль" name="repeatpass">
                            <input type="file" name="photo_path">
                            <button type="submit">Зарегестрироваться</button>
                        </form>
                    </div>
                    <div class="form-wrapper" id="login-form">
                        <form action="login.php" method="post">
                            <input type="text" placeholder="Имя" name="login">
                            <input type="password" placeholder="Пароль" name="password">
                            <button type="submit">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/tabby@12.0.0/dist/js/tabby.polyfills.min.js"></script>
    <script>
        var tabs = new Tabby('[data-tabs]');
    </script>
</body>

</html>