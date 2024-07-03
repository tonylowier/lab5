<?php
session_start();


$isLoggedIn = isset($_SESSION['id']);
$login = $isLoggedIn ? $_SESSION['login'] : '';
$email = $isLoggedIn ? $_SESSION['email'] : '';
$role = $isLoggedIn ? $_SESSION['role'] : '';

require_once 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Настройки SMTP для Gmail
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
        ->setUsername('gashisshh@gmail.com')
        ->setPassword('djdrvxryxxldxakj');  // Используйте предоставленный пароль приложения

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message('Новая заявка'))
        ->setFrom(['gashisshh@gmail.com' => 'ElitBuild'])
        ->setTo(['kkkiwwiii@mail.ru'])  // Замените на реальный email получателя
        ->setBody("Имя: $name\nТелефон: $phone");

    try {
        $result = $mailer->send($message);
        echo 'Сообщение успешно отправлено.';
    } catch (Exception $e) {
        echo 'Ошибка отправки сообщения: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="sass/styles.css">
    <link rel="stylesheet" href="sass/reset.css">
    <title>Главная</title>
</head>
<body>
    <header class="header">
        <div class="header__container">
            <button class="header__burger-btn" id="burger">
                <span></span><span></span><span></span>
            </button>
            <nav class="header__nav">
                <a href="index.php" class="header__logo"><img src="../images/logo.svg" alt="Логотип"></a>
                <ul class="header__list">
                    <li class="header__item"><a href="index.php" class="header__link">Услуги</a></li>
                    <li class="header__item"><a href="php/estate.php" class="header__link">Недвижимость</a></li>
                    <li class="header__item"><a href="php/about.php" class="header__link">О нас</a></li>
                </ul>
                <div class="header__buttons">
                    <?php if ($isLoggedIn): ?>
                        <a href="php/lk.php" class="header__reg">Личный Кабинет</a>
                    <?php else: ?>
                        <a href="php/auth.php" class="header__auth">Вход</a>
                        <a href="php/register.php" class="header__reg">Регистрация</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>
    <main class="main">
        <section class="hero" id="1">
            <div class="container">
                <h1 class="hero__title">Только лучшая недвижимость</h1>
                <div class="hero__wrapper">
                    <div class="hero__row">
                        <img src="images/hero.png" alt="Картинка" class="hero__img">
                    </div>
                    <div class="hero__text">
                        <h2 class="hero__subtitle">ElitBuild</h2>
                        <p class="hero__info">ведущее агентство по продаже элитной недвижимости, предлагающее своим клиентам широкий выбор роскошных объектов в престижных районах города.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="me">
            <div class="container">
                <h2 class="me__title">Почему именно мы?</h2>
                <p class="me__subtitle">Только мы соблюдаем такие сложновыполнимые 
                    <br>правила для продажи недвижимости. <br> Мы гарантируем, 
                    что плохого жилья не будет.</p>
                <div class="me__wrapper">
                    <img src="images/me1.png" alt="Картинка" class="me__img">
                    <ul class="me__list">
                        <li class="me__item">Используем только
                            проверенное жилье</li>
                        <li class="me__item">Контролируем все этапы
                            продажи</li>
                        <li class="me__item">Только проверенные
                            застройщики</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="best">
            <div class="container">
                <h2 class="best__title">Выбирай только лучшее жилье <br>
                    по хорошей цене</h2>
                <p class="best__subtitle">Наблюдайте за жильем на главной странице! 
                    Вы можете посмотреть фотографии жилья и выбрать, 
                    тот дом <br> о котором вы мечтали давно!</p>
                <div class="best__wrapper">
                    <ul class="best__list">
                        <li class="best__item">Поддержка с 12 до 20 часов по мск</li>
                        <li class="best__item">Фото домов</li>
                        <li class="best__item">Быстрый заказ</li>
                    </ul>
                    <img src="images/best.png" alt="Картинка" class="best__img">
                </div>
                <a href="php/estate.php" class="best__button">Посмотреть дома</a>
            </div>
        </section>
        <section class="form">
        <div class="container">
            <img src="images/logo2.png" alt="logo2" class="form__hero">
            <h2 class="form__title">Лучшие дома только <br> у нас!</h2>
            <form action="#" method="POST" class="form__wrapper">
                <h3 class="form__subtitle">Оставьте ваши <br> данные</h3>
                <input type="text" name="name" class="form__input" placeholder="Ваше имя" required>
                <input type="text" name="phone" class="form__input" placeholder="+7 (999) 999-99-99" required>
                <button type="submit" class="form__button">Оставить заявку</button>
            </form>
        </div>
    </section>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <p>Здравствуйте! Скоро с вами свяжемся, наши сотрудники ElitBuild уже набирают вам.</p>
        </div>
    </div>
        <section class="reviews">
            <div class="container">
                <h2 class="reviews__title">Отзывы от клиентов</h2>
                <div class="reviews__wrapper">
                    <div class="reviews__row row-one">
                        <div class="reviews__column">
                            <div class="reviews__item">
                                <div class="reviews__item-info">
                                    <img src="images/review.png" alt="Картинка">
                                    <div class="reviews__item-text">
                                        <p class="reviews__item-title">Dyrachyo</p>
                                        <p class="reviews__item-subtitle">Заказ #12432</p>
                                    </div>
                                </div>
                                <div class="reviews__item-review">
                                    <p class="reviews__item-review-text">Все супер! Дом понравился</p>
                                </div>
                                <span>около 2ч назад</span>
                            </div>
                        </div>

                        <div class="reviews__column">
                            <div class="reviews__item">
                                <div class="reviews__item-info">
                                    <img src="images/review.png" alt="Картинка">
                                    <div class="reviews__item-text">
                                        <p class="reviews__item-title">Dyrachyo</p>
                                        <p class="reviews__item-subtitle">Заказ #12432</p>
                                    </div>
                                </div>
                                <div class="reviews__item-review">
                                    <p class="reviews__item-review-text">Все супер! Дом понравился</p>
                                </div>
                                <span>около 2ч назад</span>
                            </div>
                        </div>

                        <div class="reviews__column">
                            <div class="reviews__item">
                                <div class="reviews__item-info">
                                    <img src="images/review.png" alt="Картинка">
                                    <div class="reviews__item-text">
                                        <p class="reviews__item-title">Dyrachyo</p>
                                        <p class="reviews__item-subtitle">Заказ #12432</p>
                                    </div>
                                </div>
                                <div class="reviews__item-review">
                                    <p class="reviews__item-review-text">Все супер! Дом понравился</p>
                                </div>
                                <span>около 2ч назад</span>
                            </div>
                        </div>
                    </div>

                    <div class="reviews__row row-two">
                        <div class="reviews__column">
                            <div class="reviews__item">
                                <div class="reviews__item-info">
                                    <img src="images/review.png" alt="Картинка">
                                    <div class="reviews__item-text">
                                        <p class="reviews__item-title">Dyrachyo</p>
                                        <p class="reviews__item-subtitle">Заказ #12432</p>
                                    </div>
                                </div>
                                <div class="reviews__item-review">
                                    <p class="reviews__item-review-text">Все супер! Дом понравился</p>
                                </div>
                                <span>около 2ч назад</span>
                            </div>
                        </div>

                        <div class="reviews__column">
                            <div class="reviews__item">
                                <div class="reviews__item-info">
                                    <img src="images/review.png" alt="Картинка">
                                    <div class="reviews__item-text">
                                        <p class="reviews__item-title">Dyrachyo</p>
                                        <p class="reviews__item-subtitle">Заказ #12432</p>
                                    </div>
                                </div>
                                <div class="reviews__item-review">
                                    <p class="reviews__item-review-text">Все супер! Дом понравился</p>
                                </div>
                                <span>около 2ч назад</span>
                            </div>
                        </div>

                        <div class="reviews__column">
                            <div class="reviews__item">
                                <div class="reviews__item-info">
                                    <img src="images/review.png" alt="Картинка">
                                    <div class="reviews__item-text">
                                        <p class="reviews__item-title">Dyrachyo</p>
                                        <p class="reviews__item-subtitle">Заказ #12432</p>
                                    </div>
                                </div>
                                <div class="reviews__item-review">
                                    <p class="reviews__item-review-text">Все супер! Дом понравился</p>
                                </div>
                                <span>около 2ч назад</span>
                            </div>
                        </div>
                    </div>
                    <a href="#1"><img src="images/arrow-up.png" alt="arrow-up" class="reviews__up"></a>

                </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__container">
            <a href="index.php" class="footer__logo"><img src="../images/logo.svg" alt="Логотип"></a>
            <div class="footer__content">
                <ul class="footer__list">
                    <a href="index.php" class="footer__link"><li class="footer__item">Услуги</li></a>
                    <a href="php/estate.php" class="footer__link"><li class="footer__item">Недвижимость</li></a>
                </ul>

                <ul class="footer__list">
                    <a href="php/about.php" class="footer__link"><li class="footer__item">О нас</li></a>
                    <a href="php/about.php" class="footer__link"><li class="footer__item">Контакты</li></a>
                </ul>
                <div class="footer__links">
                    <img src="images/vk.png" alt="VK">
                    <img src="images/yt.png" alt="YouTube">
                </div>
            </div>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>