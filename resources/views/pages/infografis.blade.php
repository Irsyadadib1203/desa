@section('title', 'Infografis')

@section('content')
<body>

    @extends('includes.navbar')

    <main class="main">


  <!-- Section 1: Gender -->
  <section>
    <h2>1. Berdasarkan Jenis Kelamin</h2>
    <canvas id="genderChart"></canvas>
  </section>

<section id="dusun" class="dusun section">
  <div class="container" data-aos="fade-up">
    <h3 class="fw-bold text-success">Berdasarkan Dusun</h3>

    <div class="row">
      <div class="col-md-6">
        <canvas id="dusunChart"></canvas>
      </div>
      <div class="col-md-6 d-flex align-items-center">
        <div>
          <h5><b>Keterangan:</b></h5>
          <p>Dusun Jatikrejo I : 687 Jiwa</p>
          <p>Dusun Jatikrejo II : 1172 Jiwa</p>
          <p>Dusun Karang Pelem : 605 Jiwa</p>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Section 3: Pekerjaan -->
  <section>
    <h2>3. Berdasarkan Pekerjaan</h2>
    <canvas id="jobChart"></canvas>
  </section>

  <!-- Section 4: Pendidikan -->
  <section>
    <h2>4. Berdasarkan Pendidikan</h2>
    <canvas id="eduChart"></canvas>
  </section>

  <!-- Section 5: Kelompok Umur -->
<section style="margin: 40px 0;">
  <h2 style="font-weight: 700;">5. Berdasarkan Kelompok Umur</h2>
  <canvas id="ageChart" height="100"></canvas>

  <div style="margin-top: 15px; font-size: 14px; line-height: 1.6;">
    <p>
      Untuk jenis kelamin <b>laki-laki</b>, kelompok umur <b>45–49</b> adalah kelompok umur tertinggi
      dengan jumlah <b>120 orang (8.76%)</b>. Sedangkan kelompok umur <b>≥85</b> adalah yang terendah
      dengan jumlah <b>3 orang (0.22%)</b>.
    </p>
    <p>
      Untuk jenis kelamin <b>perempuan</b>, kelompok umur <b>45–49</b> adalah kelompok umur tertinggi
      dengan jumlah <b>117 orang (8.30%)</b>. Sedangkan kelompok umur <b>80–84</b> adalah yang terendah
      dengan jumlah <b>8 orang (0.18%)</b>.
    </p>
  </div>
</section>

    </main>

    @extends('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- ================= SCRIPT ================= -->
  <script>
    // Section 1: Gender
    const genderCtx = document.getElementById("genderChart").getContext("2d");
    new Chart(genderCtx, {
      type: 'pie',
      data: {
        labels: ['Laki-laki', 'Perempuan'],
        datasets: [{
          data: [1225, 1239],
          backgroundColor: ['#4b77a9', '#f39c12']
        }]
      }
    });
  </script>

  <script>
    // Section 2: Dusun
    const dusunCtx = document.getElementById("dusunChart").getContext("2d");
    new Chart(dusunCtx, {
      type: 'pie',
      data: {
        labels: ['Jatikrejo I', 'Jatikrejo II', 'Karang Pelem'],
        datasets: [{
          data: [687, 1172, 605],
          backgroundColor: ['#2ecc71', '#3498db', '#e67e22']
        }]
      }
    });
  </script>

  <script>
    // Section 3: Pekerjaan
    const jobCtx = document.getElementById("jobChart").getContext("2d");
    new Chart(jobCtx, {
      type: 'bar',
      data: {
        labels: [
          'Belum/Tidak Bekerja', 'Karyawan Swasta', 'Buruh Harian Lepas',
          'Mengurus Rumah Tangga', 'Pelajar/Mhs', 'Petani/Pekebun',
          'Buruh Tani/Perkebunan', 'Pensiunan'
        ],
        datasets: [{
          label: 'Jumlah Jiwa',
          data: [309, 509, 28, 434, 325, 410, 240, 8],
          backgroundColor: '#9b59b6'
        }]
      },
      options: {
        indexAxis: 'y',
        responsive: true
      }
    });
  </script>

  <script>
    // Section 4: Pendidikan
    const eduCtx = document.getElementById("eduChart").getContext("2d");
    new Chart(eduCtx, {
      type: 'bar',
      data: {
        labels: [
          'Tidak/Belum Sekolah', 'Belum Tamat SD', 'Tamat SD',
          'SLTP', 'SLTA', 'Diploma I/II', 'Diploma III',
          'Diploma IV/S1', 'Strata II', 'Strata III'
        ],
        datasets: [{
          label: 'Jumlah Jiwa',
          data: [417, 422, 619, 397, 523, 6, 23, 54, 3, 0],
          backgroundColor: '#e74c3c'
        }]
      },
      options: {
        responsive: true
      }
    });
  </script>

<script>
  const ctx = document.getElementById("ageChart").getContext("2d");

  const labels = [
    '0-4', '5-9', '10-14', '15-19', '20-24',
    '25-29', '30-34', '35-39', '40-44', '45-49',
    '50-54', '55-59', '60-64', '65-69', '70-74',
    '75-79', '≥85'
  ];

  const male = [52, 66, 86, 93, 79, 104, 106, 81, 98, 120, 91, 89, 71, 39, 18, 13, 3];
  const female = [49, 69, 92, 92, 82, 91, 80, 82, 100, 117, 95, 98, 74, 44, 26, 25, 8];

  // Total untuk line chart
  const total = male.map((m, i) => m + female[i]);

  new Chart(ctx, {
    data: {
      labels: labels,
      datasets: [
        {
          type: 'bar',
          label: 'Laki-laki',
          data: male,
          backgroundColor: 'rgba(52, 152, 219, 0.8)',
          borderRadius: 6,
          order: 2,
          barPercentage: 0.45,
          categoryPercentage: 0.5
        },
        {
          type: 'bar',
          label: 'Perempuan',
          data: female,
          backgroundColor: 'rgba(231, 76, 60, 0.8)',
          borderRadius: 6,
          order: 2,
          barPercentage: 0.45,
          categoryPercentage: 0.5
        },
        {
          type: 'line',
          label: 'Total',
          data: total,
          borderColor: '#16a085',
          borderWidth: 2,
          fill: false,
          tension: 0.3,
          pointBackgroundColor: '#16a085',
          order: 1
        }
      ]
    },
    options: {
      responsive: true,
      interaction: { mode: 'index', intersect: false },
      scales: {
        x: {
          stacked: false, // Bar jadi sampingan
          grid: { display: false },
          title: { display: true, text: 'Kelompok Umur' }
        },
        y: {
          beginAtZero: true,
          title: { display: true, text: 'Jumlah Penduduk' }
        }
      },
      plugins: {
        legend: { position: 'bottom' },
        tooltip: {
          backgroundColor: 'rgba(0,0,0,0.75)',
          titleFont: { weight: 'bold' },
          bodyFont: { size: 13 }
        }
      }
    }
  });
</script>

</body>
@endsection