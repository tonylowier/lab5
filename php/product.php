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
    <link rel="stylesheet" href="../sass/product.css">
    <link rel="stylesheet" href="../sass/reset.css">
    <title>Главная</title>
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
        <img src="../images/line.png" class="line">
        <section class="hero">
        </section>
        <section class="description">
            <div class="container">
                <p class="description__text">Описание объекта <br>
                    Цоколь <br>
                    Холл – игровая, постирочная, серверная, гардеробная, рабочая кухня с продуктовым лифтом, с/у, спортзал, СПА-зона (хаммам, сауна, душевые, комната отдыха, с/у), тех.помещение под бассейн, воздушная лестница в зону бассейна. <br>
                    1 этаж <br>
                    Прихожая, гардеробная, кухня, столовая, продуктовый лифт, терраса с зоной барбекю, с/у гостевой (отделка керамогранитом), лестничный холл, гостиная с камином и выходом на террасу, кабинет с выходом на террасу, СПА-зона (бассейн с противотоком, детский бассейн, зона отдыха с лежаками, выход на террасу, лестница в зону сауны и хаммама и в мастер-спальню. <br>
                    2 этаж <br>
                    Холл – гостиная с балконом, гостевая спальня с гардеробной и с/у, мастер- блок: холл, мини-кухня, 2 гардеробные, 2 с/у, спальня, выход в бассейн и СПА-зону.
                    Мансарда <br>
                    Холл – игровая, мини-кухня, 2 спальни с с/у и гардеробными, комната няни, с/у.</p>
            </div>
        </section>
        <section class="advantages">
            <div class="container">
                <div class="advantages__row">
                    <div class="advantages__column">
                        <div class="advantages__item">
                            <div class="advantages__item-row">
                                <img src="../images/icon-home.png" alt="Картинка">
                                <p class="advantages__text">О доме</p>
                            </div>
                            <div class="advantages__item-list-row">
                                <ul class="advantages__list">
                                    <li class="advantages__list-item">Тип жилья:</li>
                                    <li class="advantages__list-item">Площадь:</li>
                                    <li class="advantages__list-item">Цена:</li>
                                    <li class="advantages__list-item">Количество спален:</li>
                                    <li class="advantages__list-item">Состояние:</li>
                                    <li class="advantages__list-item">Мебель:</li>
                                    <li class="advantages__list-item">SPA:</li>
                                </ul>
                                <ul class="advantages__list">
                                    <li class="advantages__list-item">Дом</li>
                                    <li class="advantages__list-item">1400 м2</li>
                                    <li class="advantages__list-item">321 429 ₽ / м2</li>
                                    <li class="advantages__list-item">6</li>
                                    <li class="advantages__list-item">Под ключ</li>
                                    <li class="advantages__list-item">Без мебели</li>
                                    <li class="advantages__list-item">Есть</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="advantages__column">
                        <div class="advantages__item">
                            <div class="advantages__item-row">
                                <img src="../images/icon-water.png" alt="Картинка">
                                <p class="advantages__text">Удобства</p>
                            </div>
                            <div class="advantages__item-list-row">
                                <ul class="advantages__list">
                                    <li class="advantages__list-item">Канализация:</li>
                                    <li class="advantages__list-item">Электроснабжение:</li>
                                    <li class="advantages__list-item">Газоснабжение:</li>
                                    <li class="advantages__list-item">Водоснабжение:</li>

                                </ul>
                                <ul class="advantages__list">
                                    <li class="advantages__list-item">Центральная</li>
                                    <li class="advantages__list-item">Есть</li>
                                    <li class="advantages__list-item">Магистр</li>
                                    <li class="advantages__list-item">Центральное</li>
                                </ul>
                            </div>
                        </div>
                    </div>



                    <div class="advantages__column">
                        <div class="advantages__item">
                            <div class="advantages__item-row">
                                <img src="../images/icon-forest.png" alt="Картинка">
                                <p class="advantages__text">Об участке</p>
                            </div>
                            <div class="advantages__item-list-row">
                                <ul class="advantages__list">
                                    <li class="advantages__list-item">Площадь:</li>
                                </ul>
                                <ul class="advantages__list">
                                    <li class="advantages__list-item">12 сот.</li>
                                </ul>
                            </div>
                        </div>
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