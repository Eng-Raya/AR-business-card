/*=============== SWIPER JS GALLERY ===============*/
let swiperCards = new Swiper(".gallery-cards", {
  loop: true,
  loopedSlides: 5,
  cssMode: true,
  effect: 'fade',
});

let swiperThumbs = new Swiper(".gallery-thumbs", {
  loop: true,
  loopedSlides: 5,
  slidesPerView: 3,
  centeredSlides: true,
  slideToClickedSlide: true,

  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

swiperThumbs.controller.control = swiperCards;




// Button js and overlay 
document.addEventListener('DOMContentLoaded', function () {
  var popupButton = document.getElementById('popup-button');
  var overlay = document.getElementById('overlay');
  var formBox = document.getElementById('form-box');
  var myForm = document.getElementById('my-form');

  popupButton.addEventListener('click', function () {
    overlay.style.display = 'block';
    formBox.style.display = 'block';
    myForm.style.display = 'block';
  });

  document.addEventListener('click', function (event) {
    var isClickInsideForm = myForm.contains(event.target);
    var isClickInsideButton = popupButton.contains(event.target);

    if (!isClickInsideForm && !isClickInsideButton) {
      formBox.style.display = 'none';
      myForm.style.display = 'none';
    }
  });
  overlay.addEventListener('click', function () {
    overlay.style.display = 'none';
    formBox.style.display = 'none';
  });


  document.addEventListener('click', function (event) {
    var isClickInsideForm = myForm.contains(event.target);
    var isClickInsideButton = popupButton.contains(event.target);

    if (!isClickInsideForm && !isClickInsideButton) {
      overlay.style.display = 'none';
      formBox.style.display = 'none';
      myForm.style.display = 'none';
    }
  });

  overlay.addEventListener('click', function () {
    overlay.style.display = 'none';
    formBox.style.display = 'none';
  });


  

});



