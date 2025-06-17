
///////////////////My Works /////////////////////////////////
let slides = document.querySelectorAll('.slide');
let currentIndex = 0;
let slideInterval = setInterval(nextSlide, 3000);

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove('active');
    if (i === index) slide.classList.add('active');
  });
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
}

document.getElementById('next').onclick = () => {
  nextSlide();
  resetInterval();
};

document.getElementById('prev').onclick = () => {
  prevSlide();
  resetInterval();
};

function resetInterval() {
  clearInterval(slideInterval);
  slideInterval = setInterval(nextSlide, 300000);  
}