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


  myForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission for demonstration purposes
    // Perform form submission or other desired actions here
  });
  myForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Perform necessary operations here before redirecting to the payment page

    // Display a confirmation window
    var confirmation = confirm('Are you sure you want to proceed to the payment page?');
    if (confirmation) {
      // If the user agrees, redirect them to the payment page
      window.location.href = 'payment-page.html';
    } else {
      // If the user declines, display an alert message
      var alertMessage = document.createElement('div');
      alertMessage.textContent = 'Payment process canceled';
      alertMessage.classList.add('alert-message', 'alert-info');
      document.body.appendChild(alertMessage);
    }
  });

});



