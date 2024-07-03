<?php
    session_start();


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
    <link rel="stylesheet" href="../sass/styles.css">
    <link rel="stylesheet" href="../sass/about.css">
    <link rel="stylesheet" href="../sass/reset.css">
    <title>О нас</title>
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
        <section class="hero" id="1">
            <div class="container">
                <div class="hero__wrapper">
                    <img src="../images/home.png" alt="Дом">
                    <div class="hero__text">
                        <h1 class="hero__title">КТО ТАКИЕ ElitBuild?</h1>
                        <p class="hero__subtitle">Как Вы уже могли понять, мы сами не раз попадались на уловки мошенников
                            и на некомпетентную работу некоторых сервисов по продаже\покупке домов 
                           "Почему бы не создать свой идеальный сервис?", - подумал один из создателей ElitBuild. 
                           Была собрана команда, 
                           брошены все средства и силы, так и появился еще маленький, 
                           но уже с багажом немалого опыта сервис ElitBuild, который нацелен исключительно 
                           на удовлетворение потребностей наших любимых клиентов.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="team">
            <div class="container">
                <h2 class="team__title">Наша команда</h2>
                <div class="team__wrapper">
                    <img src="../images/team.png" alt="Команда">
                </div>
                <div class="team__column">
                    <div class="team__row">
                        <div class="team__box">
                            <p class="team__text">Мы здесь, чтобы помочь тебе!</p>
                            <p class="team__text">Да, именно тебе и заодно всему миру! 😉</p>
                            <p class="team__text">Наша цель - это довольный клиент, который сэкономил себе время, нервы и деньги. </p>
                            <p class="team__text">Хочешь купить дом? Мы продадим его невероятно быстро! Хочешь купить дом?</p>
                            <p class="team__text">Мы предоставим тебе прекрасное обслуживание, лучшие скидки, невообразимые акции и выгодные цены!</p>
                            <p class="team__text">А ещё мы посоветуем тебе фильм, если ты попросишь!</p>
                        </div>
                        <img src="../images/team-1.png" alt="Дом">
                    </div>

                    <div class="team__row team-two">
                        <img src="../images/team-2.png" alt="Дом">
                        <p class="team__text-two">Ключ к сердцу клиента - постоянное усовершенствование нашего сервиса. 
                            Уже в ближайшее время появится возможность 
                            купить или продать дома с другими, не менее популярными жилищами. </p>
                    </div>
                </div>
            </div>
            <a href="#1"><img src="../images/arrow-up.png" alt="arrow-up" class="team__up"></a>
        </section>
        <img src="../images/line.png" class="line">
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