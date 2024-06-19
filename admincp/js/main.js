document.addEventListener("DOMContentLoaded", function() {
    var slides = document.querySelectorAll(".slide");
    var slideIndex = 0;
  
    showSlide();
  
    function showSlide() {
      slides[slideIndex].classList.add("fade-in");
      setTimeout(function() {
        slides[slideIndex].classList.remove("fade-in");
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide();
      }, 4000); // 4 seconds
    }
  });