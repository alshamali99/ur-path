document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelectorAll('.slide');
  const dotsContainer = document.getElementById('dots');
  let current = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle('active', i === index);
      if (dotsContainer.children[i]) {
        dotsContainer.children[i].classList.toggle('active', i === index);
      }
    });

    // التعامل مع العنصر المعروض (صورة أو فيديو فقط)
    const currentSlide = slides[index];
    const viewer = currentSlide.querySelector('img, iframe');
    if (viewer && viewer.dataset.type) {
      const cloned = viewer.cloneNode(true);
      viewer.replaceWith(cloned);

      cloned.addEventListener('click', () => {
        const modal = document.getElementById('modal-viewer');
        const modalContent = document.getElementById('modal-content');
        let contentHTML = '';

        if (cloned.dataset.type === 'image') {
          contentHTML = `<img src="${cloned.src}" style="max-width:100%; max-height:100%;">`;
        } else if (cloned.dataset.type === 'video') {
          const videoSrc = cloned.dataset.src || cloned.src;
          contentHTML = `<iframe src="${videoSrc}" frameborder="0" allowfullscreen style="width:90vw; height:60vh;"></iframe>`;
        }

        modalContent.innerHTML = contentHTML;
        modal.style.display = 'flex';
      });
    }
  }

  function nextSlide() {
    current = (current + 1) % slides.length;
    showSlide(current);
  }

  function prevSlide() {
    current = (current - 1 + slides.length) % slides.length;
    showSlide(current);
  }

  document.getElementById('next')?.addEventListener('click', nextSlide);
  document.getElementById('prev')?.addEventListener('click', prevSlide);

  slides.forEach((_, i) => {
    const dot = document.createElement('span');
    dot.className = 'dot' + (i === 0 ? ' active' : '');
    dot.addEventListener('click', () => {
      current = i;
      showSlide(i);
    });
    dotsContainer.appendChild(dot);
  });

  document.getElementById('modal-close').addEventListener('click', () => {
    document.getElementById('modal-viewer').style.display = 'none';
  });

  showSlide(current);
});
