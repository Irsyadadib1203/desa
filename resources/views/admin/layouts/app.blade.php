<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Windmill Dashboard')</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- Tailwind CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />

  <!-- Alpine.js -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('assets/js/init-alpine.js') }}"></script>

  <!-- Chart.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
</head>

<body class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
  <!-- Sidebar -->
  @include('admin.components.sidebar')

  <div class="flex flex-col flex-1 w-full">
    <!-- Navbar -->
    @include('admin.components.navbar')

    <!-- Content -->
    <main class="h-full overflow-y-auto">
      <div class="container px-6 mx-auto grid">
        @yield('content')
      </div>
    </main>
  </div>
</body>
</html>
