@extends('admin.layouts.app')

@section('title', 'Struktur Organisasi dan Tata Kerja')

@section('content')
<div 
  x-data="{ 
      showEditModal: false, 
      showAddModal: false,
      showModalHapus : false,
      sotkId: '', 
      nama: '', 
      jabatan: '', 
      preview: '' 
  }"
  class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 relative"
>
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Daftar Struktur Organisasi</h4>

  <!-- Tombol Tambah -->
  <button 
      type="button"
      @click="showAddModal = true"
      class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
      Tambah Anggota
  </button>

  {{-- Tabel Data --}}
  <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Jabatan</th>
            <th class="px-4 py-3">Foto</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($sotk as $item)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">{{ $item->nama }}</td>
              <td class="px-4 py-3">{{ $item->jabatan }}</td>
              <td class="px-4 py-3">
                @if($item->gambar)
                  <img src="{{ asset('storage/'.$item->gambar) }}" alt="Foto" class="w-12 h-12 object-cover rounded-lg">
                @else
                  <span class="text-gray-400">Tidak ada</span>
                @endif
              </td>
              <td class="px-4 py-3 flex items-center space-x-2">
                {{-- Tombol Edit --}}
                <button 
                  @click="
                    showEditModal = true;
                    sotkId = '{{ $item->id_sotk }}';
                    nama = '{{ addslashes($item->nama) }}';
                    jabatan = '{{ addslashes($item->jabatan) }}';
                    preview = '{{ $item->gambar ? asset('storage/'.$item->gambar) : '' }}';
                  "
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-700"
                  title="Edit Data"
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

  <!-- Modal Tambah -->
  <div
    x-show="showAddModal"
    x-transition
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
  >
    <div
      x-show="showAddModal"
      @click.away="showAddModal = false"
      @keydown.escape="showAddModal = false"
      class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-2xl p-6 relative"
    >
      <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Tambah Anggota SOTK</h2>

      <form action="{{ route('sotk.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-4">
        @csrf
        <div>
          <label class="block text-sm text-gray-700 dark:text-gray-400">Nama</label>
          <input type="text" name="nama" class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>

        <div>
          <label class="block text-sm text-gray-700 dark:text-gray-400">Jabatan</label>
          <input type="text" name="jabatan" class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>

        <div>
          <label class="block text-sm text-gray-700 dark:text-gray-400">Foto</label>
          <input type="file" name="gambar" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200">
        </div>

        <div class="flex justify-end space-x-2 mt-4">
          <button type="button" @click="showAddModal = false" 
                  class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600">
            Batal
          </button>
          <button type="submit" 
                  class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit -->
  <div
    x-show="showEditModal"
   x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-clock
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
  >
    <div
      x-show="showEditModal"
      x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
      class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-2xl p-6 relative"
    >
      <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Edit Data SOTK</h2>

      <form :action="`{{ url('/admin/sotk') }}/${sotkId}`" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-4">
        @csrf
        @method('PUT')

        <div>
          <label class="block text-sm text-gray-700 dark:text-gray-400">Nama</label>
          <input type="text" name="nama" x-model="nama" class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>

        <div>
          <label class="block text-sm text-gray-700 dark:text-gray-400">Jabatan</label>
          <input type="text" name="jabatan" x-model="jabatan" class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>

        <div>
          <label class="block text-sm text-gray-700 dark:text-gray-400">Foto</label>
          <template x-if="preview">
            <img :src="preview" alt="Preview" class="w-32 h-32 object-cover rounded-lg mb-2">
          </template>
          <input type="file" name="gambar" 
                 @change="preview = URL.createObjectURL($event.target.files[0])" 
                 class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200">
        </div>

        <div class="flex justify-end space-x-2 mt-4">
          <button type="button" @click="showEditModal = false" 
                  class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600">
            Batal
          </button>
          <button type="submit" 
                  class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Simpan Perubahan
          </button>
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

        <form action="{{ route('sotk.destroy', $item->id_sotk) }}" method="POST">
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
