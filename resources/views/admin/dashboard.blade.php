@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
  </h2>

  <!-- Banner -->
  <a href="https://github.com/estevanmaito/windmill-dashboard"
     class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
    <div class="flex items-center">
      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9 12h2V6H9v6zM9 16h2v-2H9v2z" />
      </svg>
      <span>Star this project on GitHub</span>
    </div>
    <span>View more →</span>
  </a>

  <!-- Cards -->
  <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M13 7H7v6h6V7z" />
        </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total clients</p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">6,389</p>
      </div>
    </div>

    <!-- Tambahkan 3 card lainnya seperti contoh Windmill -->
  </div>

  <!-- Table -->
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Client</th>
            <th class="px-4 py-3">Amount</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Date</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
              <div class="flex items-center text-sm">
                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="" />
                </div>
                <div>
                  <p class="font-semibold">Hans Burger</p>
                  <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-sm">$863.45</td>
            <td class="px-4 py-3 text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                Approved
              </span>
            </td>
            <td class="px-4 py-3 text-sm">6/10/2020</td>
          </tr>
          <!-- Tambahkan data lainnya -->
        </tbody>
      </table>
    </div>
  </div>
@endsection
