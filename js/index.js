"use strict";

// chay banner slide
var slideIndex;
function showSlides() {
    const slides = document.getElementsByClassName('banner__slide--items');
    const dots = document.getElementsByClassName('dot')
    for(var i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    for(var i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace('active', '');
        console.log(dots[i].className)
    }

    slides[slideIndex].style.display = "block";  
    dots[slideIndex].className += " active";
    //chuyển đến slide tiếp theo
    slideIndex++;
    //nếu đang ở slide cuối cùng thì chuyển về slide đầu
    if (slideIndex >= slides.length ) {
      slideIndex = 0
    }    
    //tự động chuyển đổi slide sau 5s
    setTimeout(showSlides, 5000);
}
//mặc định hiển thị slide đầu tiên 

showSlides(slideIndex = 0);

function currentSlide(n) {
  showSlides(slideIndex = n);
}