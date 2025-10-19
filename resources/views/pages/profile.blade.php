@section('title', 'Infografis')

@section('content')
<body>

    @extends('includes.navbar')

    <main class="main">
      
  <!-- Faq Section -->
  <section id="faq" class="faq section">
  <div class="container-fluid">
    <div class="row gy-4">

      <!-- Bagian VISI & MISI -->
      <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

          <!-- VISI -->
          <div class="faq-item visi-box text-center">
            <h3>VISI</h3>
            <div class="faq-content">
              <p>MEMBANGUN DESA JATIREJO YANG TRANSPARAN, AMANAH, SEJAHTERA, DAN INOVATIF</p>
            </div>
          </div>

          <!-- MISI -->
          <div class="faq-item misi-box">
            <h3 class="text-center">MISI</h3>
            <div class="faq-content">
              <ol>
                <li>Menyelenggarakan pemerintahan desa yang transparan, bersih, dan demokratis serta terbebas dari bentuk-bentuk penyelenggaraan</li>
                <li>Mengembangkan potensi desa di Bidang Ekonomi</li>
                <li>Meningkatkan kesejahteraan masyarakat, Aparatur Pemerintah Desa, dan Lembaga Desa</li>
                <li>Meningkatkan Infrastruktur dan Prasarana Desa</li>
              </ol>
            </div>
          </div>

        </div>
      </div>

      <!-- Bagian Gambar -->
      <div class="col-lg-5 order-1 order-lg-2">
        <img src="{{ asset('assets/images/people/BERSAMA.jpeg') }}" class="img-fluid" alt="Gambar Visi Misi"
          data-aos="zoom-in" data-aos-delay="100" style="border-radius: 20px;">
      </div>
    </div>
  </div>
  </section>
  <!-- /Faq Section -->

<section id="struktur" class="struktur-section">
  <div class="struktur-container" data-aos="fade-up" data-aos-delay="200">

    <!-- === KIRI: GAMBAR + DESKRIPSI === -->
    <div class="struktur-left">
      <!-- === TAB 1 === -->
      <div id="tab-aparatur" class="struktur-content active">
        <h5>BAGAN STRUKTUR ORGANISASI PEMERINTAH DESA JATIREJO <br> KECAMATAN WONOASRI KABUPATEN MADIUN</h5>
        <img src="assets/images/struktur/APARATUR DESA.png" alt="Struktur Aparatur Desa">
      </div>

      <!-- === TAB 2 === -->
      <div id="tab-bpd" class="struktur-content">
        <h5>STRUKTUR KELEMBAGAAN BADAN PERMUSYAWARATAN DESA (BPD) <br> DESA JATIREJO KECAMATAN WONOASRI KABUPATEN MADIUN</h5>
        <img src="assets/images/struktur/BPD.png" alt="Struktur BPD">
      </div>

      <!-- === TAB 3 === -->
      <div id="tab-lpmd" class="struktur-content">
        <h5>DAFTAR KEPENGURUSAN LEMBAGA PEMBERDAYAAN MASYARAKAT DESA (LPMD) <br> DESA JATIREJO KECAMATAN WONOASRI KABUPATEN MADIUN</h5>
        <img src="assets/images/struktur/LPMD.png" alt="Struktur LPMD">
      </div>
    </div>

    <!-- === KANAN: MENU TAB HORIZONTAL === -->
    <div class="struktur-right">
      <div class="tab-header">
        <button class="active" data-target="tab-aparatur">APARATUR DESA</button>
        <button data-target="tab-bpd">BPD</button>
        <button data-target="tab-lpmd">LPMD</button>
      </div>
    </div>

  </div>
</section>

    </main>

    @extends('includes.footer')

<script>
document.querySelectorAll('.tab-header button').forEach(btn => {
  btn.addEventListener('click', () => {
    // Hapus active di semua button
    document.querySelectorAll('.tab-header button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Sembunyikan semua konten
    document.querySelectorAll('.struktur-content').forEach(content => content.classList.remove('active'));

    // Tampilkan konten target
    const target = document.getElementById(btn.dataset.target);
    target.classList.add('active');
  });
});
</script>

</body>
@endsection