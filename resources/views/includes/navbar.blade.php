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
    <link href="assets/css/style.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: KnightOne
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Updated: Oct 16 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="assets/images/Pemkab.png" alt="Logo">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home')}}">Beranda</a></li>
          <li><a href="{{ route('profile')}}">Profil Desa</a></li>
          <li class="dropdown"><a href="#"><span> Infografis </span><i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('penduduk') }}">Penduduk</a></li>
              <li><a href="{{ route('apbdes') }}">APBDES</a></li>
              <li><a href="{{ route('stunting') }}">Stunting</a></li>
              <li><a href="{{ route('bansos') }}">Bansos</a></li>
              <li><a href="{{ route('idm') }}">IDM</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Lembaga</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('bumdes') }}">BUMDES</a></li>
              <li><a href="{{ route('koperasi') }}">Koperasi Desa</a></li>
              <li><a href="{{ route('rt') }}">RT</a></li>
              <li><a href="{{ route('pkk') }}">PKK</a></li>
              <li><a href="{{ route('karang-taruna') }}">Karang Taruna</a></li>
            </ul>
          </li>
          <li><a href=" {{ route('berita')}} ">Berita</a></li>
          <li class="dropdown"><a href="#"><span>PPID</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('visi-misi') }}">Visi dan Misi</a></li>
              <li><a href="{{ route('struktur') }}">Struktur PPID</a></li>
              <li><a href="{{ route('tugas') }}">Tugas PPID</a></li>
              <li><a href="{{ route('pelayanan') }}">Pelayanan PPID</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
</body>
</html>