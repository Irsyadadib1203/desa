<!-- Sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto overflow-x-visible bg-white dark:bg-gray-800 md:block flex-shrink-0">

  <div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
      Desa Jatirejo
    </a>
    <ul class="mt-6">
<li class="relative px-6 py-3">
  <a href="{{ route('admin.dashboard') }}"
     class="inline-flex items-center w-full text-sm font-semibold
            px-2 py-2 rounded-lg transition-all duration-200
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'
                : 'hover:bg-gray-100 dark:hover:bg-gray-700 
                   hover:text-gray-800 dark:hover:text-gray-200 
                   hover:pl-8' }}">
            
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10h3m10-11l2 2v9h-3v-4h-6v4H8"/>
    </svg>

    <span class="ml-4">Dashboard</span>
  </a>
</li>

      <li class="relative px-6 py-3">
        <a href="{{ route('galeri') }}"
            class="inline-flex items-center w-full text-sm font-semibold
            px-2 py-2 rounded-lg transition-all duration-200
            {{ request()->routeIs('galeri')
                ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'
                : 'hover:bg-gray-100 dark:hover:bg-gray-700 
                   hover:text-gray-800 dark:hover:text-gray-200 
                   hover:pl-8' }}">
        <i class="bi bi-images"></i>
    <span class="ml-4">Galeri Desa</span>
    </a>
      </li>
      <!-- Berita -->
      <li class="relative px-6 py-3 group">
        <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 opacity-0 group-hover:opacity-100 transition"></span>

        <a href="{{ route('berita') }}"
            class="inline-flex items-center w-full text-sm font-semibold
            px-2 py-2 rounded-lg transition-all duration-200
            {{ request()->routeIs('berita')
                ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'
                : 'hover:bg-gray-100 dark:hover:bg-gray-700 
                   hover:text-gray-800 dark:hover:text-gray-200 
                   hover:pl-8' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h11l3 3v11a2 2 0 01-2 2z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 13H7M17 9H7m4 8H7" />
          </svg>
          <span class="ml-4">Berita Desa</span>
        </a>
      </li>
      <!-- Sotk -->
      <li class="relative px-6 py-3">
        <a href="{{ route('sotk') }}"
            class="inline-flex items-center w-full text-sm font-semibold
            px-2 py-2 rounded-lg transition-all duration-200
            {{ request()->routeIs('sotk')
                ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'
                : 'hover:bg-gray-100 dark:hover:bg-gray-700 
                   hover:text-gray-800 dark:hover:text-gray-200 
                   hover:pl-8' }}">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 4v4m0 0H6m6 0h6M6 8v4m0 0h4m-4 0H2m16-4v4m0 0h4m-4 0h-4m-6 4v4m0 0H6m6 0h6" />
        </svg>
          <span class="ml-4">Sotk Desa</span>
        </a>
      </li>

      <!-- Lembaga -->
      <li class="relative px-6 py-3">
        <a href="{{ route('lembaga') }}"
            class="inline-flex items-center w-full text-sm font-semibold
            px-2 py-2 rounded-lg transition-all duration-200
            {{ request()->routeIs('lembaga')
                ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'
                : 'hover:bg-gray-100 dark:hover:bg-gray-700 
                   hover:text-gray-800 dark:hover:text-gray-200 
                   hover:pl-8' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 21h18M4 10h16M10 21V6h4v15M7 10V6h10v4" />
        </svg>
          <span class="ml-4">Lembaga Desa</span>
        </a>
      </li>

      <!-- Manajemen Pengguna -->
      @if(auth()->check() && auth()->user()->role == 'superadmin')
      <li class="relative px-6 py-3">
        <a href="{{ route('pengguna') }}"
            class="inline-flex items-center w-full text-sm font-semibold
            px-2 py-2 rounded-lg transition-all duration-200
            {{ request()->routeIs('pengguna')
                ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'
                : 'hover:bg-gray-100 dark:hover:bg-gray-700 
                   hover:text-gray-800 dark:hover:text-gray-200 
                   hover:pl-8' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
          </svg>
          <span class="ml-4">Manajemen Pengguna</span>
        </a>
      </li>
      @endif

      <!-- Data Penduduk (dropdown) -->
      <li class="relative px-6 py-3" x-data="{ open: {{ request()->routeIs(
            'penduduk','umur','pendidikan','pekerjaan','perkawinan','agama'
          ) ? 'true' : 'false' }} }">

      <button
        @click="open = !open"
        class="inline-flex items-center w-full text-sm font-semibold
              px-2 py-2 rounded-lg transition-all duration-200
              hover:bg-gray-100 dark:hover:bg-gray-700
              hover:text-gray-800 dark:hover:text-gray-200
              hover:pl-8
              {{ request()->routeIs('penduduk','umur','pendidikan','pekerjaan','perkawinan','agama')
              ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'    
              : '' }}">
          <span class="inline-flex items-center">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M17 20v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2" />
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 10a4 4 0 100-8 4 4 0 000 8z" />
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M23 20v-2a4 4 0 00-3-3.87" />
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M16 3.13a4 4 0 010 7.75" />
    </svg>
          <span class="ml-4">Data Penduduk</span>
          </span>
          <svg class="w-4 h-4 transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
  <!-- SUBMENU -->
  <ul x-show="open" class="mt-2 pl-8 space-y-1 text-sm">
    <li>
      <a href="{{ route('penduduk') }}"
        class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
               hover:bg-gray-100 dark:hover:bg-gray-700
               hover:text-gray-800 dark:hover:text-gray-200">
        Jumlah Penduduk & Keluarga
      </a>
    </li>
    <li>
      <a href="{{ route('umur') }}"
        class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
               hover:bg-gray-100 dark:hover:bg-gray-700
               hover:text-gray-800 dark:hover:text-gray-200">
        Berdasarkan Umur
      </a>
    </li>
    <li>
      <a href="{{ route('pendidikan') }}"
        class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
               hover:bg-gray-100 dark:hover:bg-gray-700
               hover:text-gray-800 dark:hover:text-gray-200">
        Berdasarkan Pendidikan
      </a>
    </li>
    <li>
      <a href="{{ route('pekerjaan') }}"
        class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
               hover:bg-gray-100 dark:hover:bg-gray-700
               hover:text-gray-800 dark:hover:text-gray-200">
        Berdasarkan Pekerjaan
      </a>
    </li>
    <li>
      <a href="{{ route('perkawinan') }}"
        class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
               hover:bg-gray-100 dark:hover:bg-gray-700
               hover:text-gray-800 dark:hover:text-gray-200">
        Berdasarkan Perkawinan
      </a>
    </li>
    <li>
      <a href="{{ route('agama') }}"
        class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
               hover:bg-gray-100 dark:hover:bg-gray-700
               hover:text-gray-800 dark:hover:text-gray-200">
        Berdasarkan Agama
      </a>
    </li>
  </ul>
</li>

<!-- APBDes (dropdown) -->
<li class="relative px-6 py-3"
    x-data="{ open: {{ request()->routeIs(
        ['pembiayaan','pendapatan','belanja','total.apbdes']
    ) ? 'true' : 'false' }} }">

  <button
    @click="open = !open"
    class="inline-flex items-center w-full text-sm font-semibold
          px-2 py-2 rounded-lg transition-all duration-200
          hover:bg-gray-100 dark:hover:bg-gray-700
          hover:text-gray-800 dark:hover:text-gray-200
          hover:pl-8
          {{ request()->routeIs(['pembiayaan','pendapatan','belanja','total.apbdes'])
              ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'
              : '' }}">
    
    <span class="inline-flex items-center">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 21V10m6 11V3m6 18v-6m4 6H2"></path>
      </svg>
      <span class="ml-4">APBDes</span>
    </span>

    <svg class="w-4 h-4 transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"></path>
    </svg>
  </button>

  <!-- SUBMENU -->
  <ul x-show="open" class="mt-2 pl-8 space-y-1 text-sm">
    <li>
      <a href="{{ route('pembiayaan') }}"
         class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
                hover:bg-gray-100 dark:hover:bg-gray-700
                hover:text-gray-800 dark:hover:text-gray-200">
        Pembiayaan APBDes
      </a>
    </li>

    <li>
      <a href="{{ route('pendapatan') }}"
         class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
                hover:bg-gray-100 dark:hover:bg-gray-700
                hover:text-gray-800 dark:hover:text-gray-200">
        Pendapatan APBDes
      </a>
    </li>

    <li>
      <a href="{{ route('belanja') }}"
         class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
                hover:bg-gray-100 dark:hover:bg-gray-700
                hover:text-gray-800 dark:hover:text-gray-200">
        Belanja APBDes
      </a>
    </li>

    <li>
      <a href="{{ route('total.apbdes') }}"
         class="block px-2 py-2 rounded-md text-gray-600 dark:text-gray-400
                hover:bg-gray-100 dark:hover:bg-gray-700
                hover:text-gray-800 dark:hover:text-gray-200">
        Total APBDes
      </a>
    </li>

  </ul>
</li>

      <!-- Bansos -->
      <li class="relative px-6 py-3">
        <a href="{{ route('bansos') }}"
            class="inline-flex items-center w-full text-sm font-semibold
            px-2 py-2 rounded-lg transition-all duration-200
            {{ request()->routeIs('bansos')
                ? 'bg-blue-600 text-white pl-8 hover:bg-blue-700 focus:bg-blue-700'
                : 'hover:bg-gray-100 dark:hover:bg-gray-700 
                   hover:text-gray-800 dark:hover:text-gray-200 
                   hover:pl-8' }}">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 7h18v10H3z" />
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M7 7V5h10v2" />
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M10 12h4" />
        </svg>
          <span class="ml-4">Bansos</span>
        </a>
      </li>

      <!-- Tambahkan menu lain di sini -->
    </ul>
  </div>
</aside>

<!-- Sidebar Mobile -->
<div
  x-show="isSideMenuOpen"
  x-transition:enter="transition ease-in-out duration-150"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in-out duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  @click="closeSideMenu"
  class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center md:hidden"
></div>

<aside
  class="fixed inset-y-0 z-20 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden flex-shrink-0"
  x-show="isSideMenuOpen"
  x-transition:enter="transition ease-in-out duration-150"
  x-transition:enter-start="opacity-0 transform -translate-x-20"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in-out duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0 transform -translate-x-20"
  @click.away="closeSideMenu"
  @keydown.escape="closeSideMenu"
>
  <div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
      Windmill Dashboard
    </a>
    <ul class="mt-6">
      <li class="relative px-6 py-3">
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10h3m10-11l2 2v9h-3v-4h-6v4H8"/>
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>

      <li class="relative px-6 py-3">
        <a href="{{ route('galeri') }}"
           class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
          <i class="bi bi-images"></i>
          <span class="ml-4">Galeri Desa</span>
        </a>
      </li>
      <!-- Berita -->
      <li class="relative px-6 py-3">
        <a href="{{ route('berita') }}"
           class="inline-flex items-center w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
          </svg>
          <span class="ml-4">Berita Desa</span>
        </a>
      </li>

      <!-- Sotk -->
      <li class="relative px-6 py-3">
        <a href="{{ route('sotk') }}"
           class="inline-flex items-center w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M3 3h18v18H3z"></path>
          </svg>
          <span class="ml-4">Sotk Desa</span>
        </a>
      </li>

      <!-- Lembaga -->
      <li class="relative px-6 py-3">
        <a href="{{ route('lembaga') }}"
           class="inline-flex items-center w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M9 5h6v14H9z"></path>
          </svg>
          <span class="ml-4">Lembaga Desa</span>
        </a>
      </li>

      <!-- Manajemen Pengguna -->
      @if(auth()->check() && auth()->user()->role == 'superadmin')
      <li class="relative px-6 py-3">
        <a href="{{ route('pengguna') }}"
           class="inline-flex items-center w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
          </svg>
          <span class="ml-4">Manajemen Pengguna</span>
        </a>
      </li>
      @endif

      <!-- Data Penduduk (dropdown) -->
      <li class="relative px-6 py-3" x-data="{ open: false }">
        <button
          @click="open = !open"
          class="inline-flex items-center justify-between w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200"
        >
          <span class="inline-flex items-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path d="M3 4h18v6H3zM3 14h8v6H3zM15 14h6v6h-6z"></path>
            </svg>
            <span class="ml-4">Data Penduduk</span>
          </span>
          <svg class="w-4 h-4 transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul x-show="open" class="mt-2 pl-8 space-y-1 text-sm text-gray-500">
          <li><a href="{{ route('penduduk') }}">Jumlah Penduduk & Keluarga</a></li>
          <li><a href="{{ route('umur') }}">Berdasarkan Umur</a></li>
          <li><a href="{{ route('pendidikan') }}">Berdasarkan Pendidikan</a></li>
          <li><a href="{{ route('pekerjaan') }}">Berdasarkan Pekerjaan</a></li>
          <li><a href="{{ route('perkawinan') }}">Berdasarkan Perkawinan</a></li>
          <li><a href="{{ route('agama') }}">Berdasarkan Agama</a></li>
        </ul>
      </li>

      <!-- Bansos -->
      <li class="relative px-6 py-3">
        <a href="{{ route('bansos') }}"
           class="inline-flex items-center w-full text-sm font-semibold hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M4 6h16M4 10h16M4 14h16"></path>
          </svg>
          <span class="ml-4">Bansos</span>
        </a>
      </li>
      
    </ul>
  </div>
</aside>