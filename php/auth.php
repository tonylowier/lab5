<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../sass/auth.css">
    <link rel="stylesheet" href="../sass/styles.css">
    <link rel="stylesheet" href="../sass/reset.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Вход</title>
</head>

<body>
    <header class="header">
        <div class="header__container">
            <button class="header__burger-btn" id="burger">
                <span></span><span></span><span></span>
            </button>
            <nav class="header__nav">
                <a href="../index.php" class="header__logo"><img src="../images/logo.svg" alt="Логотип"></a>
                <ul class="header__list">
                    <li class="header__item"><a href="../index.php" class="header__link">Услуги</a></li>
                    <li class="header__item"><a href="estate.php" class="header__link">Недвижимость</a></li>
                    <li class="header__item"><a href="about.php" class="header__link">О нас</a></li>
                </ul>
                <div class="header__buttons">
                    <a href="auth.php" class="header__auth">Вход</a>
                    <a href="register.php" class="header__reg">Регистрация</a>
                </div>
            </nav>
        </div>
    </header>
    <main class="main">
        <section class="auth">
            <div class="container">
                <h1 class="auth__title">Добро пожаловать на <span>ElitBuild</span></h1>
                <p class="auth__text">Пожалуйста, заполните все поля чтобы войти на сайт.</p>
                <div class="auth__wrapper">
                    <form action="auth_handler.php" method="POST" class="auth__form">
                        <?php
                        session_start();
                        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
                        $form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
                        session_unset();
                        ?>
                        <input type="email" name="email" class="auth__input" placeholder="Email" value="<?php echo isset($form_data['email']) ? htmlspecialchars($form_data['email']) : ''; ?>" required>
                        <?php if (isset($errors['email'])): ?>
                            <p class="error"><?php echo htmlspecialchars($errors['email']); ?></p>
                        <?php endif; ?>
                        <input type="password" name="password" class="auth__input" placeholder="Пароль" required>
                        <?php if (isset($errors['password'])): ?>
                            <p class="error"><?php echo htmlspecialchars($errors['password']); ?></p>
                        <?php endif; ?>
                        <div class="g-recaptcha" data-sitekey="6Ldk0wUqAAAAAEkEwPbImllaA9Zfu4FLRjXATumk"></div>
                        <?php if (isset($errors['recaptcha'])): ?>
                            <p class="error"><?php echo htmlspecialchars($errors['recaptcha']); ?></p>
                        <?php endif; ?>
                        <button type="submit" class="auth__button">Войти</button>
                        <a href="register.php" class="auth__link">Еще не зарегистрированы?</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__container">
            <a href="../index.php" class="footer__logo"><img src="../images/logo.svg" alt="Логотип"></a>
            <div class="footer__content">
                <ul class="footer__list">
                    <a href="../index.php" class="footer__link"><li class="footer__item">Услуги</li></a>
                    <a href="estate.php" class="footer__link"><li class="footer__item">Недвижимость</li></a>
                </ul>

                <ul class="footer__list">
                    <a href="about.php" class="footer__link"><li class="footer__item">О нас</li></a>
                    <a href="about.php" class="footer__link"><li class="footer__item">Контакты</li></a>
                </ul>
                <div class="footer__links">
                    <img src="../images/vk.png" alt="VK">
                    <img src="../images/yt.png" alt="YouTube">
                </div>
            </div>
        </div>
    </footer>
    <script src="../js/script.js"></script>
</body>
</html>
