@section('title', 'Beranda')

@section('content')
<body class="index">

  <header id="header" class="header-home d-flex align-items-center fixed-top">
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

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/images/bg.jpg" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center text-center">
        <h2 data-aos="fade-up" data-aos-delay="100">SELAMAT DATANG</h2>
        <h2 data-aos="fade-up" data-aos-delay="100">WEBSITE RESMI DESA JATIREJO</h2>
        <h5 data-aos="fade-up" data-aos-delay="200">Sumber informasi terbaru tentang Desa Jatirejo</h5>
      </div>

    </section><!-- /Hero Section -->

    <!-- Sambutan Section -->
<section id="sambutan" class="sambutan section">
  <div class="container" data-aos="fade-up">
    <div class="row align-items-center gy-4">

      <!-- Foto Kepala Desa -->
      <div class="col-lg-4 text-center">
        <img src="assets/images/people/ALI MANSUR.jpeg" alt="Kepala Desa" style="max-width: 300px; border-radius: 15px;">
        <h6 class="mt-3 mb-0 fw-bold">ALI MANSUR</h6>
        <h6 class="text-muted">Kepala Desa Jatirejo</h6>
      </div>

      <!-- Sambutan -->
      <div class="col-lg-8">
        <h4 class="text-success fw-bold mb-3">Sambutan Kepala Desa</h4>
        <h4 class="sambutan-text">
         Selamat datang di Website Resmi Pemerintah Desa Jatirejo. Kami merasa bangga dan bersyukur dapat menghadirkan platform digital ini sebagai sarana informasi dan komunikasi yang efektif antara Pemerintah Desa Jatirejo dengan seluruh lapisan masyarakat.
         Sebagai desa yang terus berkembang, Jatirejo memiliki berbagai potensi unggulan di bidang pertanian, ekonomi kreatif, dan sumber daya manusia yang menjadi modal utama dalam mendorong kemajuan dan kesejahteraan masyarakat.
         Website ini dirancang untuk memberikan informasi yang transparan, akurat, dan mudah diakses, meliputi kegiatan pemerintahan desa, program pembangunan, pelayanan publik, hingga potensi wilayah yang dimiliki Desa Jatirejo.
         Kami berkomitmen untuk terus meningkatkan kualitas pelayanan kepada masyarakat dengan mengedepankan prinsip transparansi, partisipasi, dan akuntabilitas dalam setiap langkah pembangunan desa.
         Melalui website ini, kami berharap dapat memperkuat komunikasi antara pemerintah desa dan masyarakat, serta membuka ruang partisipasi aktif bagi seluruh warga dalam mewujudkan Desa Jatirejo yang maju, mandiri, dan sejahtera.
         Semoga kehadiran website ini dapat menjadi jembatan yang mempererat hubungan antara pemerintah dan masyarakat, serta menjadi sumber informasi yang bermanfaat bagi semua pihak.
      </h4>
      </div>

    </div>
  </div>
</section>
<!-- /Sambutan Section -->

    <!-- News Section -->
<section id="news" class="news section">
  <div class="container section-title" data-aos="fade-up" delay="100">
    <h2>Berita Desa</h2>
    <p>Menyajikan informasi terbaru tentang peristiwa, berita, dan prestasi desa</p>
  </div>

  <div class="container" data-aos="fade-up" delay="200">
    <div class="swiper news-slider">
      <div class="swiper-wrapper">

        <!-- News Card 1 -->
        <div class="swiper-slide">
          <div class="news-item">
            <div class="news-thumb">
              <img src="assets/img/features-bg.jpg" alt="Thumbnail">
            </div>
            <div class="news-content">
              <a href="#" class="stretched-link">
                <h3>Judul Berita 1</h3>
              </a>
              <p>Ringkasan singkat isi berita ditampilkan di sini agar lebih menarik...</p>
              <div class="news-footer">
                <div class="author">
                  <i class="bi bi-person"></i> Admin Desa
                  <span class="views"><i class="bi bi-eye"></i> Dilihat 40 kali</span>
                </div>
                <div class="date">
                  <span>05 Sep 2025</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- News Card 2 -->
        <div class="swiper-slide">
          <div class="news-item">
            <div class="news-thumb">
              <img src="assets/img/features-bg.jpg" alt="Thumbnail">
            </div>
            <div class="news-content">
              <a href="#" class="stretched-link">
                <h3>Judul Berita 2</h3>
              </a>
              <p>Ringkasan singkat isi berita ditampilkan di sini agar lebih menarik...</p>
              <div class="news-footer">
                <div class="author">
                  <i class="bi bi-person"></i> Admin Desa
                  <span class="views"><i class="bi bi-eye"></i> Dilihat 25 kali</span>
                </div>
                <div class="date">
                  <span>10 Sep 2025</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- News Card 3 -->
        <div class="swiper-slide">
          <div class="news-item">
            <div class="news-thumb">
              <img src="assets/img/features-bg.jpg" alt="Thumbnail">
            </div>
            <div class="news-content">
              <a href="#" class="stretched-link">
                <h3>Judul Berita 1</h3>
              </a>
              <p>Ringkasan singkat isi berita ditampilkan di sini agar lebih menarik...</p>
              <div class="news-footer">
                <div class="author">
                  <i class="bi bi-person"></i> Admin Desa
                  <span class="views"><i class="bi bi-eye"></i> Dilihat 40 kali</span>
                </div>
                <div class="date">
                  <span>05 Sep 2025</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- News Card 4 -->
        <div class="swiper-slide">
          <div class="news-item">
            <div class="news-thumb">
              <img src="assets/img/features-bg.jpg" alt="Thumbnail">
            </div>
            <div class="news-content">
              <a href="#" class="stretched-link">
                <h3>Judul Berita 1</h3>
              </a>
              <p>Ringkasan singkat isi berita ditampilkan di sini agar lebih menarik...</p>
              <div class="news-footer">
                <div class="author">
                  <i class="bi bi-person"></i> Admin Desa
                  <span class="views"><i class="bi bi-eye"></i> Dilihat 40 kali</span>
                </div>
                <div class="date">
                  <span>05 Sep 2025</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Tambahkan berita lainnya dengan <div class="swiper-slide"> -->

      </div>
    </div>
  </div>
</section>

<!-- News Section -->

<!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Desa</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
             Jatirejo adalah Desa yang berada di kecamatan Wonoasri, Kabupaten Madiun, Jawa Timur, Indonesia. Desa Jatirejo terletak 2 Km  dari Kecamatan Wonoasri dan berjarak 8 Km sebelah Barat dari Ibu Kota Kabupaten Madiun. 
             Desa Jatirejo secara administratif dibagi menjadi 3 Dusun dengan 21 RT,   yaitu : Dusun Jatirejo I, Dusun Jatirejo II, Dusun Karang Pelem. Dengan luas wilayah 132,3 Ha.</p>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>Jatirejo adalah Desa yang berada di kecamatan Wonoasri, Kabupaten Madiun, Jawa Timur, Indonesia. Desa Jatirejo terletak 2 Km  dari Kecamatan Wonoasri dan berjarak 8 Km sebelah Barat dari Ibu Kota Kabupaten Madiun. 
              Desa Jatirejo secara administratif dibagi menjadi 3 Dusun dengan 21 RT,   yaitu : Dusun Jatirejo I, Dusun Jatirejo II, Dusun Karang Pelem. Dengan luas wilayah 132,3 Ha. </p>
            <a href="{{route('profile')}}" class="read-more"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section>
    <!-- /About Section -->
    

<!-- SOTK Section -->
<section id="sotk" class="sotk section">
  <div class="container section-title" data-aos="fade-up">
    <h2>SOTK</h2>
    <p>Menyajikan informasi terbaru tentang peristiwa, berita, dan prestasi desa</p>
  </div>

  <div class="container">
    <div class="swiper sotk-slider">
      <div class="swiper-wrapper">

        <!-- News Card 1 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/ALI MANSUR.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>ALI MANSUR</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>

        <!-- News Card 2 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/ALVIYA K.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>ALVIYA KUSUMAWATI</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>

        <!-- News Card 3 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/DIAN NUPITA.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>DIAN NUPITA</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>

        <!-- News Card 4 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/KUSWATUN KHASANAH.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>KUSWATUN KHASANAH</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>
        
         <!-- News Card 4 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/KHOIRUL ANWAR.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>KHOIRUL ANWAR</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>

         <!-- News Card 5 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/SUWITO.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>SUWITO</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>

         <!-- News Card 6 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/SARDI.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>SARDI</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>

         <!-- News Card 6 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/DWI PUTRI.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>DWI PUTRI</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>

         <!-- News Card 6 -->
        <div class="swiper-slide">
          <div class="sotk-item">
            <div class="sotk-thumb">
              <img src="assets/images/people/MAMI.jpeg" alt="Thumbnail">
              <div class="overlay">
                <h3>MAMI</h3>
                <p>Kepala Desa</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- SOTK Section -->
 
 <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Galeri Desa</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Card</li>
            <li data-filter=".filter-branding">Web</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-2.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-3.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-4.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-5.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-6.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-7.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Maps Section -->
    <section id="maps" class="maps section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 text>Peta Lokasi Desa</h2>
      </div><!-- End Section Title -->

      <div class="container">
        <div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8095.270708004039!2d111.6162069918813!3d-7.5813564610861
            24!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79b8882efe316b%3A0xb2da5e33f366dbff!2sKantor%20Kepala%20Desa%20Jat
            irejo!5e1!3m2!1sen!2sid!4v1758859117056!5m2!1sen!2sid" width="600" height="450" style="border-radius: 30px;" allowfullscreen="" 
            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
        <div>

        </div>
      </div>
    </section>
  <!-- End Maps Section -->

  </main>

  @extends('includes.footer')

  <script>
    window.addEventListener('scroll', function() {
      const header = document.querySelector('.header-home');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  </script>

</body>
@endsection