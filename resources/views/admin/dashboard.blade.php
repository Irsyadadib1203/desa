@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
  </h2>

 

  <!-- Cards -->
  <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M13 7H7v6h6V7z" />
        </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Penduduk</p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">700</p>
      </div>
    </div>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M13 7H7v6h6V7z" />
        </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Dusun</p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">3</p>
      </div>
    </div>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M13 7H7v6h6V7z" />
        </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Keluarga</p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">68</p>
      </div>
    </div>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M13 7H7v6h6V7z" />
        </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Lembaga</p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">6</p>
      </div>
    </div>

    <!-- Tambahkan 3 card lainnya seperti contoh Windmill -->
  </div>

  <!-- Table -->
  <div class="w-full overflow-hidden rounded-lg shadow-md mb-6">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Jumlah (Rp)</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-300">
              <td class="px-4 py-3 text-sm font-medium">Pendapatan</td>
              <td class="px-4 py-3 text-sm">Rp 10.000</td>
            </tr>
            <tr class="text-gray-700 dark:text-gray-300">
              <td class="px-4 py-3 text-sm font-medium">Belanja</td>
              <td class="px-4 py-3 text-sm">Rp 100.000</td>
            </tr>
            <tr class="text-gray-700 dark:text-gray-300">
              <td class="px-4 py-3 text-sm font-medium">Pembiayaan</td>
              <td class="px-4 py-3 text-sm">Rp 19.000</td>
            </tr>
            <tr class="bg-gray-100 dark:bg-gray-700 font-semibold">
              <td class="px-4 py-3 text-sm">Surplus / Defisit</td>
              <td class="px-4 py-3 text-sm 
                {{ 10.000 < 0 ? 'text-blue-600 dark:text-blue-400' : 'text-green-600 dark:text-green-400' }}">
                Rp 129.000
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
@endsection
