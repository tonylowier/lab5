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
    <link rel="stylesheet" href="../sass/estate.css">
    <link rel="stylesheet" href="../sass/reset.css">
    <title>Недвижимость</title>
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
                <h1 class="hero__title">Участвуй в акции <span> -20%</span></h1>
                <div class="hero__slider">
                    <div class="hero__wrapper">
                        <a href="javascript:void(0);" class="hero__left hero__arrow">
                            <img src="../images/arrow-left.svg" alt="Влево">
                        </a>
                        <div class="hero__text">
                            <h2 class="hero__subtitle">При покупке <span>нового жилья</span></h2>
                        </div>
                        <img src="../images/hero-2.png" alt="Картинка" class="hero__img">
                        <a href="javascript:void(0);" class="hero__right hero__arrow">
                            <img src="../images/arrow-right.svg" alt="Вправо">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        
        <img src="../images/line.png" class="line">
        <section class="catalog">
            <div class="container">
                <h2 class="catalog__title">Каталог домов <br> ElitBuild</h2>
                <div class="catalog__wrapper">
                    <div class="catalog__column">
                        <div class="catalog__item">
                            <img src="../images/catalog-1.png" alt="Контроль" class="catalog__img">
                            <div class="catalog__item-info">
                                <h3 class="catalog__subtitle">Контроль <span>качества</span></h3>
                                <p class="catalog__text">Проверка жилья состоит из 3 этапов,
                                    включающих в себя 26 пунктов.</p>
                            </div>
                        </div>
                        <div class="catalog__item">
                            <img src="../images/catalog-2.png" alt="Доставка" class="catalog__img">
                            <div class="catalog__item-info">
                                <h3 class="catalog__subtitle">Моментальная <br> <span>доставка</span></h3>
                                <p class="catalog__text">Процесс покупки жилья и его доставка занимают не более 2 минут.</p>
                            </div>
                        </div>
                    </div>
                        <img class="catalog__img-main" src="../images/catalog.png" alt="Недвижимость">
                        <div class="catalog__column">
                            <div class="catalog__item">
                                <img src="../images/catalog-3.png" alt="Лучшая цена" class="catalog__img">
                                <div class="catalog__item-info">
                                    <h3 class="catalog__subtitle">Лучшая <span>цена</span></h3>
                                    <p class="catalog__text">На сайте представлены лучшие дома в своем ценовом сегменте.</p>
                                </div>
                            </div>
                            <div class="catalog__item">
                                <img src="../images/catalog-4.png" alt="Поддержка" class="catalog__img">
                                <div class="catalog__item-info">
                                    <h3 class="catalog__subtitle">Поддержка <br> <span>12:00-20:00 МСК</span></h3>
                                    <p class="catalog__text">Вам нужна помощь в покупке недвижимости? Консультант Вам поможет.</p>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
        <img src="../images/line.png" class="line">
        <section class="products">
            <div class="container">
                <div class="products__row">
                    <div class="products__column">
                        <div class="products__item">
                            <img src="../images/products-1.png" alt="Дом" class="products__img">
                            <div class="products__item-info">
                                <p class="products__text">Дом на ул.Шишкова</p>
                            </div>
                            <div class="products__item-price">
                                <p class="products__price">15 млн. ₽</p>
                                <a href="product.php" class="products__link">Подробнее</a>
                            </div>
                        </div>
                    </div>

                    <div class="products__column">
                        <div class="products__item">
                            <img src="../images/products-1.png" alt="Дом" class="products__img">
                            <div class="products__item-info">
                                <p class="products__text">Дом на ул.Шишкова</p>
                            </div>
                            <div class="products__item-price">
                                <p class="products__price">15 млн. ₽</p>
                                <a href="product.php" class="products__link">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="products__row">
                    <div class="products__column">
                        <div class="products__item">
                            <img src="../images/products-1.png" alt="Дом" class="products__img">
                            <div class="products__item-info">
                                <p class="products__text">Дом на ул.Шишкова</p>
                            </div>
                            <div class="products__item-price">
                                <p class="products__price">15 млн. ₽</p>
                                <a href="product.php" class="products__link">Подробнее</a>
                            </div>
                        </div>
                    </div>

                    <div class="products__column">
                        <div class="products__item">
                            <img src="../images/products-1.png" alt="Дом" class="products__img">
                            <div class="products__item-info">
                                <p class="products__text">Дом на ул.Шишкова</p>
                            </div>
                            <div class="products__item-price">
                                <p class="products__price">15 млн. ₽</p>
                                <a href="product.php" class="products__link">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="products__row">
                    <div class="products__column">
                        <div class="products__item">
                            <img src="../images/products-1.png" alt="Дом" class="products__img">
                            <div class="products__item-info">
                                <p class="products__text">Дом на ул.Шишкова</p>
                            </div>
                            <div class="products__item-price">
                                <p class="products__price">15 млн. ₽</p>
                                <a href="product.php" class="products__link">Подробнее</a>
                            </div>
                        </div>
                    </div>

                    <div class="products__column">
                        <div class="products__item">
                            <img src="../images/products-1.png" alt="Дом" class="products__img">
                            <div class="products__item-info">
                                <p class="products__text">Дом на ул.Шишкова</p>
                            </div>
                            <div class="products__item-price">
                                <p class="products__price">15 млн. ₽</p>
                                <a href="product.php" class="products__link">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="products__row">
                    <div class="products__column">
                        <div class="products__item">
                            <img src="../images/products-1.png" alt="Дом" class="products__img">
                            <div class="products__item-info">
                                <p class="products__text">Дом на ул.Шишкова</p>
                            </div>
                            <div class="products__item-price">
                                <p class="products__price">15 млн. ₽</p>
                                <a href="product.php" class="products__link">Подробнее</a>
                            </div>
                        </div>
                    </div>

                    <div class="products__column">
                        <div class="products__item">
                            <img src="../images/products-1.png" alt="Дом" class="products__img">
                            <div class="products__item-info">
                                <p class="products__text">Дом на ул.Шишкова</p>
                            </div>
                            <div class="products__item-price">
                                <p class="products__price">15 млн. ₽</p>
                                <a href="product.php" class="products__link">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#1"><img src="../images/arrow-up.png" alt="arrow-up" class="products__up"></a>

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

