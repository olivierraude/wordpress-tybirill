  <?php wp_footer() ?>

  <div class="footer">
    <p>© 2024 Ferme Ty Birill</p>
    <p>Conception <a href="https://www.olivierraude.com" target="_blank" class="propaganda">O.Raude</a></p>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {

      spaceBetween: 60,
      centeredSlides: true,
      loop: true,
      grabCursor: true,
      speed: 1500,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      effect: 'coverflow',
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        scale: .85,
        slidesPerView: 3,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 2
        },
        992: {
          slidesPerView: 3
        },
      }
    });
  </script>

  </body>

  </html>