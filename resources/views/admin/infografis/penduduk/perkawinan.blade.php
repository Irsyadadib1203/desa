@extends('admin.layouts.app')

@section('title', 'Data Kategori perkawinan')

@section('content')
<main class="h-full pb-16 overflow-y-auto" x-data="kategoriPerkawinanHandler()">
  <div class="container grid px-6 mx-auto">

    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 my-6">
      Data Kategori Perkawinan
    </h2>

    {{-- Filter hanya kategori dengan nama "perkawinan" --}}
    @foreach($kategori->where('nm_kategori', 'perkawinan') as $kat)
    <div class="mb-10">
      <div class="flex items-center justify-between mb-4">
        <button 
          @click="openAddModal({{ $kat->id_kategori }}, '{{ $kat->nm_kategori }}')" 
          class="flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Tambah Data
        </button>
      </div>

      <div class="w-full mb-4 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Jumlah</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @forelse($dataKategori->where('kategori_penduduk_id_kategori', $kat->id_kategori) as $item)
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-sm">{{ $item->nama }}</td>
                <td class="px-4 py-3 text-sm">{{ $item->jumlah }}</td>
                <td class="px-4 py-3 text-sm">
                  <button 
                    @click="openEditModal({{ $item->id_data }}, '{{ $item->nama }}', '{{ $item->jumlah }}', '{{ $kat->id_kategori }}')" 
                    class="px-2 py-2 text-blue-600 hover:text-blue-800">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                  </svg>
                  </button>
                  <button 
                    @click="openDeleteModal({{ $item->id_data }}, '{{ $item->nama }}')" 
                    class="px-2 py-2 text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd">
                    </svg>
                  </button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                  Tidak ada data perkawinan.
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- ===================== MODALS ===================== --}}
  <!-- Modal Tambah -->
  <div 
    x-show="showAdd" 
    style="display: none;"
    class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50 z-50"
  >
    <form action="/kategori-penduduk" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96">
      @csrf
      <h3 class="text-lg font-semibold mb-3">Tambah Data perkawinan</h3>
      <input type="hidden" name="kategori_penduduk_id_kategori" x-bind:value="kategoriId">
      <label>Nama perkawinan</label>
      <input type="text" name="nama" class="w-full border rounded-lg p-2 mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="w-full border rounded-lg p-2 mb-4">
      <div class="flex justify-end space-x-2">
        <button type="button" @click="showAdd=false" class="px-3 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-3 py-2 bg-blue-600 text-white rounded">Simpan</button>
      </div>
    </form>
  </div>

  <!-- Modal Edit -->
  <div 
    x-show="showEdit" 
    style="display: none;"
    class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50 z-50"
  >
    <form x-bind:action="'/kategori-penduduk/' + dataItem.id_data" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96">
      @csrf
      @method('PUT')
      <h3 class="text-lg font-semibold mb-3">Edit Data perkawinan</h3>
      <label>Nama perkawinan</label>
      <input type="text" name="nama" x-bind:value="dataItem.nama" class="w-full border rounded-lg p-2 mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" x-bind:value="dataItem.jumlah" class="w-full border rounded-lg p-2 mb-4">
      <div class="flex justify-end space-x-2">
        <button type="button" @click="showEdit=false" class="px-3 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-3 py-2 bg-blue-600 text-white rounded">Simpan</button>
      </div>
    </form>
  </div>

  <!-- Modal Delete -->
  <div 
    x-show="showDelete" 
    style="display: none;"
    class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50 z-50"
  >
    <form x-bind:action="'/kategori-penduduk/' + dataItem.id_data" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96">
      @csrf
      @method('DELETE')
      <h3 class="text-lg font-semibold mb-3 text-center">Konfirmasi Hapus</h3>
      <p class="text-center mb-4">Yakin ingin menghapus <span class="font-semibold" x-text="dataItem.nama"></span>?</p>
      <div class="flex justify-center space-x-2">
        <button type="button" @click="showDelete=false" class="px-3 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-3 py-2 bg-blue-600 text-white rounded">Hapus</button>
      </div>
    </form>
  </div>
</main>

<script>
function kategoriPerkawinanHandler() {
  return {
    // state modal
    showAdd: false,
    showEdit: false,
    showDelete: false,

    // data untuk form
    kategoriId: null,
    dataItem: {},

    // fungsi buka modal tambah
    openAddModal(id, nmKategori) {
      this.kategoriId = id;
      this.showAdd = true;
    },

    // fungsi buka modal edit
    openEditModal(id, nama, jumlah, kategori_id) {
      this.dataItem = {
        id_data: id,
        nama: nama,
        jumlah: jumlah,
        kategori_id: kategori_id
      };
      this.showEdit = true;
    },

    // fungsi buka modal hapus
    openDeleteModal(id, nama) {
      this.dataItem = { id_data: id, nama: nama };
      this.showDelete = true;
    }
  };
}
</script>
@endsection
