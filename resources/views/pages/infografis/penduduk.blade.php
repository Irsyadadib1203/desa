@section('title', 'Rukun Tetangga')

@section('content')
<body class="starter-page-page">

@include('includes.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
      <div class="container position-relative">
        <h1>Data Penduduk</h1>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Starter Page</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
  <section>
    <h2>Penduduk Berdasarkan Kelompok Umur</h2>
    <canvas id="ageChart"></canvas>
  </section>
  <!-- /Starter Section Section -->

  </main>

  @include('includes.footer')

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById("ageChart").getContext("2d");

  const labels = [
    '0-4', '5-9', '10-14', '15-19', '20-24',
    '25-29', '30-34', '35-39', '40-44', '45-49',
    '50-54', '55-59', '60-64', '65-69', '70-74',
    '75-79', '≥85'
  ];

  const dataMale = [52, 66, 86, 93, 79, 104, 106, 81, 98, 120, 91, 89, 71, 39, 18, 13, 3];
  const dataFemale = [49, 69, 92, 92, 82, 91, 80, 82, 100, 117, 95, 98, 74, 44, 26, 25, 8];
  const dataTotal = dataMale.map((m, i) => m + dataFemale[i]);

  const config = {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [
        {
          label: 'Laki-laki',
          data: dataMale,
          backgroundColor: 'rgba(0, 153, 255, 1)',
          borderColor: '#8DBCC7',
          borderWidth: 1,
          borderRadius: 4
        },
        {
          label: 'Perempuan',
          data: dataFemale,
          backgroundColor: 'rgba(254, 0, 190, 1)',
          borderColor: 'rgba(254, 0, 190, 1)',
          borderWidth: 1,
          borderRadius: 4
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Distribusi Penduduk Berdasarkan Kelompok Umur'
        },
        tooltip: {
          mode: 'index',
          intersect: false
        },
        legend: {
          position: 'bottom'
        }
      },
      interaction: {
        mode: 'index',
        intersect: false
      },
      scales: {
        x: {
          title: {
            display: true,
            text: 'Kelompok Umur'
          },
          stacked: false // ← bar laki-laki dan perempuan berdampingan
        },
        y: {
          title: {
            display: true,
            text: 'Jumlah Penduduk'
          },
          stacked: false, // ← tidak ditumpuk
          beginAtZero: true
        }
      }
    }
  };

  new Chart(ctx, config);
</script>

</body>

</html>