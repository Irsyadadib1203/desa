@extends('admin.layouts.app')

@section('title', 'Data Umur Penduduk')

@section('content')
<div 
  x-data="{
    showModalTambah: false,
    showModalEdit: false,
    showModalHapus: false,
    idEdit: '',
    namaEdit: '',
    jumlahEdit: '',

    deleteId: '',
    deleteName: '',

  openDeleteModal(id, name) {
    this.deleteId = id;
    this.deleteName = name;
    this.showDelete = true;
  }
  }"
  class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 relative"
>
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Data Bansos
  </h4>

  {{-- Tombol Tambah --}}
  <div class="mb-4 flex justify-between items-center">
    <button @click="showModalTambah = true"
      class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
      + Tambah Data
    </button>
  </div>

  {{-- Tabel Data --}}
  <div class="w-full overflow-x-auto rounded-lg shadow">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700">
          <th class="px-4 py-3">Nama Bansos</th>
          <th class="px-4 py-3">Jumlah</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @forelse ($dataBansos as $data)
        <tr class="text-gray-700 dark:text-gray-300">
          <td class="px-4 py-3">{{ $data->nm_bansos }}</td>
          <td class="px-4 py-3">{{ $data->jumlah }}</td>
          <td class="px-4 py-3 flex space-x-2 justify-center">
            {{-- Tombol Edit --}}
            <button 
              @click="
                showModalEdit = true;
                idEdit = '{{ $data->id_bansos }}';
                namaEdit = '{{ addslashes($data->nm_bansos) }}';
                jumlahEdit = '{{ $data->jumlah }}';
              "
              class="text-blue-600 hover:bg-blue-100 dark:hover:bg-gray-700 rounded-lg px-2 py-1">
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
        @empty
        <tr>
          <td colspan="4" class="text-center py-4 text-gray-500 dark:text-gray-400">Tidak ada data</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Modal Tambah Data --}}
  <div x-show="showModalTambah" class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl">
      <h2 class="text-lg font-semibold mb-4">Tambah Data Bansos</h2>
      <form action="{{ route('bansos.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label>Nama Bansos</label>
          <input type="text" name="nm_bansos" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Jumlah</label>
          <input type="number" name="jumlah" min="0" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalTambah = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Edit Data --}}
  <div x-show="showModalEdit" 
  x-transition:enter="transition ease-out duration-150"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div x-show="showModalEdit" 
    x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl">
      <h2 class="text-lg font-semibold mb-4">Edit Data Bansos</h2>
      <form :action="'/admin/infografis/bansos/' + idEdit" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
          <label>Nama Bansos</label>
          <input type="text" name="nm_bansos" x-model="namaEdit" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Jumlah</label>
          <input type="number" name="jumlah" x-model="jumlahEdit" min="0" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalEdit = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

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
        Apakah kamu yakin ingin menghapus bansos ini? Tindakan ini tidak bisa dibatalkan.
      </p>
      <div class="flex justify-end space-x-3">
        <button type="button" @click="showModalHapus = false"
          class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600">
          Batal
        </button>

        <form :action="'/admin/infografis/bansos/delete/' + deleteId" method="POST">
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
