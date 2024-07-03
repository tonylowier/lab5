document.addEventListener('DOMContentLoaded', function () {
  const leftArrow = document.querySelector('.hero__left');
  const rightArrow = document.querySelector('.hero__right');
  const imgElement = document.querySelector('.hero__img');
  const subtitleElement = document.querySelector('.hero__subtitle span');

  // Массив слайдов (добавьте больше слайдов по необходимости)
  const slides = [
      { img: '../images/hero-1.png', subtitle: 'в кредит' },
      { img: '../images/hero-2.png', subtitle: 'нового жилья' }
  ];

  let currentIndex = 0;

  function updateSlider(index) {
      imgElement.src = slides[index].img;
      subtitleElement.textContent = slides[index].subtitle;
  }

  leftArrow.addEventListener('click', function () {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
      updateSlider(currentIndex);
  });

  rightArrow.addEventListener('click', function () {
      currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
      updateSlider(currentIndex);
  });

  // Начальная инициализация слайдера
  updateSlider(currentIndex);
});

$(document).ready(function() {
    $('input[name="phone"]').mask('+7 (999) 999-99-99');

    $('form').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: $(this).serialize(),
            success: function(response) {
                // Показать модальное окно при успешной отправке формы
                showModal();
            }
        });
    });

    function showModal() {
        var modal = $('#modal');
        var closeButton = $('.close-button');

        modal.show();

        closeButton.click(function() {
            modal.hide();
        });

        $(window).click(function(event) {
            if (event.target.id === 'modal') {
                modal.hide();
            }
        });
    }
});

