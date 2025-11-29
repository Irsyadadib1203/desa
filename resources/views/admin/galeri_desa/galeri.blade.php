@extends('admin.layouts.app')

@section('title', 'Galeri Desa')

@section('content')
<div 
  x-data="{ showAddModal: false, showEditModal: false, showModalHapus: false, galeriId: '', judul: '', tgl_upload: '', status: '', preview: '' }"
  class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 relative"
>
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Daftar Galeri Desa</h4>

  <!-- Tombol Tambah Galeri -->
  <button type="button" @click="showAddModal = true" 
          class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
      Tambah Galeri
  </button>

  {{-- Tabel Galeri --}}
  <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Gambar</th>
            <th class="px-4 py-3">Tanggal Upload</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($galeris as $galeri)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">{{ $galeri->judul }}</td>
              <td class="px-4 py-3">
              @if($galeri->gambar)
                <img src="{{ asset('storage/'.$galeri->gambar) }}" alt="Gambar" class="w-12 h-12 object-cover rounded-lg">
              @else
                <span class="text-gray-400">Tidak ada</span>
              @endif
              </td>
              <td class="px-4 py-3 text-sm">{{ $galeri->tgl_upload }}</td>
              <td class="px-4 py-3 text-sm">
                <span class="px-2 py-1 rounded text-black {{ $galeri->status === 'publish' ? 'bg-green-500' : 'bg-gray-500' }}">
                  {{ ucfirst($galeri->status) }}
                </span>
              </td>
              <td class="px-4 py-3 flex items-center space-x-2">
                {{-- Tombol Edit --}}
                <button 
                  @click="
                    showEditModal = true;
                    galeriId = '{{ $galeri->id_galeri }}';
                    judul = '{{ addslashes($galeri->judul) }}';
                    tgl_upload = '{{ $galeri->tgl_upload }}';
                    status = '{{ $galeri->status }}';
                    preview = '{{ $galeri->gambar ? asset('storage/'.$galeri->gambar) : '' }}';
                  "
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:bg-blue-100 dark:hover:bg-gray-700"
                  title="Edit Galeri"
                >
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                  </svg>
                </button>

                {{-- Tombol Hapus --}}
                <button type="button" @click="showModalHapus = true"
                    class="px-3 py-1 text-sm text-red-600 rounded-lg hover:bg-red-100 dark:hover:bg-red-700">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Tambah Galeri -->
  <div x-show="showAddModal" 
  x-transition:enter="transition ease-out duration-150"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  x-cloak class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <div x-show="showAddModal"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-4xl p-6 relative 
              max-h-[90vh] overflow-y-auto">
      <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Tambah Galeri</h2>
      <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <label class="block text-sm text-gray-700 dark:text-gray-400">Judul</label>
          <input type="text" name="judul" class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="mb-4">
          <label class="block text-sm text-gray-700 dark:text-gray-400">Tanggal Upload</label>
          <input type="date" name="tgl_upload" class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="mb-4">
          <label class="block text-sm text-gray-700 dark:text-gray-400">Status</label>
          <select name="status" class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" requiblue>
            <option value="draft">Draft</option>
            <option value="publish">Publish</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm text-gray-700 dark:text-gray-400">File Gambar</label>
          <input type="file" name="gambar" accept="image/*" class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="flex justify-end space-x-2">
          <button type="button" @click="showAddModal = false" class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-lg hover:bg-gray-400">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
        </div>
      </form>
    </div>
  </div>
  
<!-- Modal Edit Galeri -->
<div 
  x-show="showEditModal" 
  x-transition:enter="transition ease-out duration-150"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
>
  <div x-show="showEditModal"
  x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
  class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-4xl p-6 relative 
              max-h-[90vh] overflow-y-auto">
              
    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Edit Galeri</h2>

    <form :action="`{{ url('/galeri') }}/${galeriId}`" method="POST" enctype="multipart/form-data"
          class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @csrf
      @method('PUT')

      <!-- Kolom kiri: Gambar -->
      <div class="flex flex-col items-center justify-center">
        <template x-if="preview">
          <img :src="preview" alt="Preview" class="w-60 h-60 object-cover rounded-lg mb-4 shadow">
        </template>
        <input 
          type="file" 
          name="gambar" 
          @change="preview = URL.createObjectURL($event.target.files[0])" 
          class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200"
        >
      </div>

      <!-- Kolom kanan: Form -->
      <div>
        <div class="mb-4">
          <label class="block text-sm text-gray-700 dark:text-gray-400">Judul</label>
          <input 
            type="text" 
            name="judul" 
            x-model="judul" 
            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" 
            requiblue
          >
        </div>

        <div class="mb-4">
          <label class="block text-sm text-gray-700 dark:text-gray-400">Tanggal Upload</label>
          <input 
            type="date" 
            name="tgl_upload" 
            x-model="tgl_upload" 
            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200"
          >
        </div>

        <div class="mb-4">
          <label class="block text-sm text-gray-700 dark:text-gray-400">Status</label>
          <select 
            name="status" 
            x-model="status" 
            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200"
          >
            <option value="draft">Draft</option>
            <option value="publish">Publish</option>
          </select>
        </div>

        <div class="flex justify-end space-x-2 mt-6">
          <button 
            type="button" 
            @click="showEditModal = false" 
            class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600"
          >
            Batal
          </button>
          <button 
            type="submit" 
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
          >
            Simpan
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Hapus -->
<div 
    x-show="showModalHapus"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    x-cloak
  >
    <div 
    x-show="showModalHapus"
    x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
    class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg w-96">
      <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Konfirmasi Hapus</h2>
      <p class="text-gray-600 dark:text-gray-300 mb-6">
        Apakah kamu yakin ingin menghapus berita ini? Tindakan ini tidak bisa dibatalkan.
      </p>
      <div class="flex justify-end space-x-3">
        <button type="button" @click="showModalHapus = false"
          class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600">
          Batal
        </button>

        <form action="{{ route('galeri.destroy', $galeri->id_galeri) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
            Hapus
          </button>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection
