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

  document.getElementById('student-button').addEventListener('click', function () {
    var formContent = document.getElementById('form-content');
    formContent.innerHTML = `
      <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required placeholder="Name">
      </div>
      <div class="form-group">
      <div class="upload">
      <button type = "button" class = "btn-warning">
        <i class = "fa fa-upload"></i> Upload Photo
        <input type="file">
      </button>
    </div>
      </div>
      <div class="form-group">
          <label for="linkedin-profile">LinkedIn Profile:</label>
          <input type="text" id="linkedin-profile" name="linkedin-profile" required placeholder="LinkedIn URL ">
      </div>
      <div class="form-group">
          <label for="github">GitHub:</label>
          <input type="text" id="github" name="github" required placeholder="GitHub URL ">
      </div>
      <div class="form-group">
          <label for="resume-url">Resume URL:</label>
          <input type="text" id="resume-url" name="resume-url" required placeholder="Resume URL">
      </div>
      <div class="form-group">
          <label for="gmail">Gmail:</label>
          <input type="email" id="gmail" name="gmail" required placeholder="Email">
      </div>
      <button type="submit">Submit</button>
    `;
  });

  document.getElementById('freelancer-button').addEventListener('click', function () {
    var formContent = document.getElementById('form-content');
    formContent.innerHTML = `
      <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required placeholder="Name">
      </div>
      <div class="form-group">
      <div class="upload">
      <button type = "button" class = "btn-warning">
        <i class = "fa fa-upload"></i> Upload Photo
        <input type="file">
      </button>
    </div>
    <label>
      </div>
      <div class="form-group">
          <label for="linkedin-profile">LinkedIn Profile:</label>
          <input type="text" id="linkedin-profile" name="linkedin-profile" required placeholder="LinkedIn URL">
      </div>
      <div class="form-group">
          <label for="github">GitHub:</label>
          <input type="text" id="github" name="github" required placeholder="GitHub URL">
      </div>
      <div class="form-group">
          <label for="resume-url">Resume URL:</label>
          <input type="text" id="resume-url" name="resume-url" required placeholder="Resume URL">
      </div>
      <div class="form-group">
          <label for="website-url">Website URL:</label>
          <input type="text" id="website-url" name="website-url" required placeholder="Website URL">
      </div>
      <div class="form-group">
          <label for="gmail">Gmail:</label>
          <input type="email" id="gmail" name="gmail" required placeholder="Email">
      </div>
      <button type="submit">Submit</button>
    `;
  });
  document.getElementById('company-button').addEventListener('click', function () {
    var formContent = document.getElementById('form-content');
    formContent.innerHTML = `
          <div class="form-group">
            <label for="name">Name:</label>
           <input type="text" id="name" name="name" required placeholder="Name">
          </div>
          <div class="form-group">
              <label for="location">Location:</label>
              <input type="text" id="location" name="location" required placeholder="Location">
          </div>
          <div class="form-group">
              <label for="facebook">Facebook:</label>
              <input type="text" id="facebook" name="facebook" required placeholder="Facebook">
          </div>
          <div class="form-group">
              <label for="website-url">Website URL:</label>
              <input type="text" id="website-url" name="website-url" required placeholder="Website URL ">
          </div>
          <div class="form-group">
              <label for="gmail">Gmail:</label>
              <input type="email" id="gmail" name="gmail" required placeholder="Email">
          </div>
          <button type="submit">Submit</button>
      `;
  });

  document.getElementById('special-button').addEventListener('click', function () {
    var formContent = document.getElementById('form-content');
    formContent.innerHTML = `
            <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required placeholder="Name">
          </div>
          <div class="form-group">
              <label for="location">Location:</label>
              <input type="text" id="location" name="location" required placeholder="Location">
          </div>
          <div class="form-group">
              <label for="facebook">Facebook:</label>
              <input type="text" id="facebook" name="facebook" required placeholder="Facebook">
          </div>
          <div class="form-group">
              <label for="website-url">Website URL:</label>
              <input type="text" id="website-url" name="website-url" required placeholder="Website URL">
          </div>
          <div class="form-group">
              <label for="video-url">Video URL:</label>
              <input type="text" id="video-url" name="video-url" required placeholder="Video URL">
          </div>
          <div class="form-group">
              <label for="gmail">Gmail:</label>
              <input type="email" id="gmail" name="gmail" required placeholder="Email">
          </div>
          <button type="submit">Submit</button>
      `;
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



