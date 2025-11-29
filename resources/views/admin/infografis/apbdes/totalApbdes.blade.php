@extends('admin.layouts.app')

@section('title', 'Total APBDes')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 my-6">
      Total APBDes
    </h2>

    {{-- Filter Tahun --}}
    <form method="GET" action="{{ route('total.apbdes') }}" class="mb-6">
      <label for="tahun_id" class="text-gray-700 dark:text-gray-200 font-semibold">Pilih Tahun:</label>
      <select name="tahun_id" id="tahun_id" onchange="this.form.submit()" 
        class="border rounded-lg p-2 ml-2 dark:bg-gray-700 dark:text-white">
        <option value="">-- Pilih Tahun --</option>
        @foreach($tahun as $t)
          <option value="{{ $t->id }}" {{ $tahunFilter == $t->id ? 'selected' : '' }}>
            {{ $t->tahun }}
          </option>
        @endforeach
      </select>
    </form>

    {{-- Jika belum pilih tahun --}}
    @if(!$tahunFilter)
      <div class="p-6 bg-yellow-100 dark:bg-yellow-800 rounded-lg text-gray-700 dark:text-gray-200">
        Silakan pilih tahun terlebih dahulu untuk melihat total APBDes.
      </div>
    @else
    {{-- Tabel Total --}}
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
              <td class="px-4 py-3 text-sm">Rp {{ number_format($data['pendapatan'], 0, ',', '.') }}</td>
            </tr>
            <tr class="text-gray-700 dark:text-gray-300">
              <td class="px-4 py-3 text-sm font-medium">Belanja</td>
              <td class="px-4 py-3 text-sm">Rp {{ number_format($data['belanja'], 0, ',', '.') }}</td>
            </tr>
            <tr class="text-gray-700 dark:text-gray-300">
              <td class="px-4 py-3 text-sm font-medium">Pembiayaan</td>
              <td class="px-4 py-3 text-sm">Rp {{ number_format($data['pembiayaan'], 0, ',', '.') }}</td>
            </tr>
            <tr class="bg-gray-100 dark:bg-gray-700 font-semibold">
              <td class="px-4 py-3 text-sm">Surplus / Defisit</td>
              <td class="px-4 py-3 text-sm 
                {{ $data['surplus'] < 0 ? 'text-blue-600 dark:text-blue-400' : 'text-green-600 dark:text-green-400' }}">
                Rp {{ number_format($data['surplus'], 0, ',', '.') }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    @endif

  </div>
</main>
@endsection
