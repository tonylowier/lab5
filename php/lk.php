<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: auth.html");
    exit();
}

$isLoggedIn = isset($_SESSION['id']);
$login = $isLoggedIn ? $_SESSION['login'] : '';
$email = $isLoggedIn ? $_SESSION['email'] : '';
$role = $isLoggedIn ? $_SESSION['role'] : '';
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../sass/lk.css">
    <link rel="stylesheet" href="../sass/styles.css">
    <link rel="stylesheet" href="../sass/reset.css">
    <title>Личный кабинет</title>
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
                    <?php if ($isLoggedIn): ?>
                        <a href="lk.php" class="header__reg">Личный Кабинет</a>
                    <?php else: ?>
                        <a href="auth.php" class="header__auth">Вход</a>
                        <a href="register.php" class="header__reg">Регистрация</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>
    <main class="main">
        <section class="lk">
            <div class="container">
                <div class="lk__wrapper">
                    <div class="lk__info">
                        <p class="lk__text">Логин: <?php echo htmlspecialchars($login); ?></p>
                        <p class="lk__text">Почта: <?php echo htmlspecialchars($email); ?></p>
                        <button class="lk__button"><a href="logout.php">Выйти</a></button>
                        <?php if ($role == 1): ?>
                            <button class="lk__button"><a href="admin.php">Администратор</a></button>
                        <?php endif; ?>
                    </div>
                    <div class="lk__img">
                        <img src="../images/avatar.png" alt="Аватар">
                    </div>
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
