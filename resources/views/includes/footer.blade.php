  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PEMERINTAH DESA JATIREJO</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Slider -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: KnightOne
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Updated: Oct 16 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
  <main class="main">
    @yield('content')
  </main>

 <footer id="footer" class="footer text-white py-5" style="background-color:#0a1435;">
  <div class="container">
    <div class="row">
      
      <!-- Kolom 1 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="d-flex align-items-center mb-3">
          <img src="assets/images/Pemkab.png" alt="Logo" style="height:60px;" class="me-2">
        </div>
        <p>Website Resmi Pemerintah Desa Jatirejo, Kecamatan Wonoasri, Kabupaten Madiun</p>
        <div class="social-links d-flex gap-5 mt-3">
          <a href="#" class="text-white fs-4"><i class="bi bi-youtube"></i></a>
          <a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-white fs-4"><i class="bi bi-twitter"></i></a>
        </div>
      </div>

      <!-- Kolom 2 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <h5 class="fw-bold text-white mb-3">HUBUNGI KAMI</h5>
        <p class="mb-1">Jl. Raya Wonoasri No.01, Jatirejo I,<br>
        Jatirejo, Kec. Wonoasri, Kabupaten Madiun, Jawa Timur 63157</p>
        <p class="mb-1"><i class="bi bi-telephone"></i> No.HP: 081234567890</p>
        <p><i class="bi bi-envelope"></i> Email: desajatirejo@gmail.com</p>
      </div>

      <!-- Kolom 3 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <h5 class="fw-bold text-white mb-3">Nomor Telepon Penting</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Pemadam Kebakaran</a></li>
          <li><a href="#" class="text-white text-decoration-none">Badan Penanggulangan Bencana Daerah (BPBD)</a></li>
          <li><a href="#" class="text-white text-decoration-none">Palang Merah Indonesia</a></li>
          <li><a href="#" class="text-white text-decoration-none">Public Safety Center 119</a></li>
        </ul>
      </div>

    </div>

    <hr class="border-secondary">

    <!-- Copyright -->
    <div class="text-center small">
      Hak cipta © 2025 - Pemerintah Desa Jatirejo
    </div>
  </div>
</footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".news-slider", {
    slidesPerView: 1,      // jumlah card yang tampil
    spaceBetween: 20,      // jarak antar card
    loop: true,            // ulang dari awal
    autoplay: {
      delay: 5000,         // jeda 3 detik
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 3, // tablet
      },
      576: {
        slidesPerView: 1, // hp
      }
    }
  });

   var swiper = new Swiper(".sotk-slider", {
    slidesPerView: 1,      // jumlah card yang tampil
    spaceBetween: 20,      // jarak antar card
    loop: true,            // ulang dari awal
    autoplay: {
      delay: 4000,         // jeda 3 detik
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 5, // tablet
      },
      576: {
        slidesPerView: 1, // hp
      }
    }
  });
</script>
  </body>
</html>
