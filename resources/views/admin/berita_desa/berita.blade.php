@extends('admin.layouts.app')

@section('title', 'Berita Desa')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Daftar Berita Desa</h4>

    <button type="button" onclick="window.location='{{ route('berita.create') }}'" class="mt-4 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 ">Tambah Berita</button>


  {{-- Tabel Berita --}}
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Isi</th>
            <th class="px-4 py-3">Gambar</th>
            <th class="px-4 py-3">Tanggal Rilis</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($beritas as $berita)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">{{ $berita->judul_berita }}</td>
              <td class="px-4 py-3 text-sm">{{ Str::limit($berita->isi_berita, 80) }}</td>
              <td class="px-4 py-3">
                @if($berita->gambar)
                  <img src="{{ asset('storage/'.$berita->gambar) }}" alt="Gambar" class="w-16 h-16 object-cover rounded-lg">
                @else
                  <span class="text-gray-400">Tidak ada</span>
                @endif
              </td>
              <td class="px-4 py-3 text-sm">{{ $berita->tgl_rilis }}</td>
              <td class="px-4 py-3">
                <form action="{{ route('berita.destroy', $berita->id_berita_desa) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?');">
                  @csrf
                  @method('DELETE')
                  <button class="px-3 py-1 text-sm text-red-600 rounded-lg hover:bg-red-100 dark:hover:bg-red-700">
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
