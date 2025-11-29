@extends('admin.layouts.app')

@section('title', 'Belanja Desa')

@section('content')
<div 
  x-data="{
    showModalTambahMenu: false,
    showModalEditMenu: false,
    showModalTambahSub: false,
    showModalEditSub: false,
    showModalDetailSub: false,
    showModalDeleteSub: false,
    showModalDelete: false,

    menuId: '', namaMenu: '', tahunMenu: '',

    subId: '', subNama: '', subJumlah: '', subBelanjaId: '',

    

    openDeleteModal(id, name) {
  this.menuId = id;
  this.namaMenu = name;
  this.showModalDelete = true;
},


    // Delete SUB MENU
    openDeleteSubModal(id, name) {
      this.subId = id;
      this.subNama = name;
      this.showModalDeleteSub = true;
    },

    // Global close
    closeModal() {
      this.showModalDelete = false;
      this.showModalDeleteSub = false;
    }
  }"
  class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 relative"
>
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Data Belanja Desa
  </h4>

  {{-- Filter Tahun --}}
  <form method="GET" action="{{ route('belanja') }}" class="flex items-center space-x-3 mb-6">
    <select name="tahun_id" onchange="this.form.submit()" class="border rounded-lg p-2 dark:bg-gray-700 dark:text-gray-200">
      <option value="">-- Semua Tahun --</option>
      @foreach ($tahun as $t)
        <option value="{{ $t->id }}" {{ request('tahun_id') == $t->id ? 'selected' : '' }}>
          {{ $t->tahun }}
        </option>
      @endforeach
    </select>
    <button type="button" @click="showModalTambahMenu = true"
      class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
      + Tambah Menu
    </button>
    <button type="button" @click="showModalTambahSub = true"
      class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
      + Tambah Sub Menu
    </button>
  </form>

  {{-- Tabel Menu Utama --}}
  <h5 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">Menu Utama</h5>
  <div class="w-full overflow-x-auto rounded-lg shadow mb-8">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700">
          <th class="px-4 py-3">Nama Menu</th>
          <th class="px-4 py-3">Tahun</th>
          <th class="px-4 py-3">Jumlah</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($belanja as $b)
        <tr class="text-gray-700 dark:text-gray-300">
          <td class="px-4 py-3">{{ $b->nama }}</td>
          <td class="px-4 py-3">{{ $b->tahun->tahun }}</td>
          <td class="px-4 py-3">Rp {{ number_format($b->jumlah, 2, ',', '.') }}</td>
          <td class="px-4 py-3 flex space-x-2 justify-center">
            <button 
              @click="
                showModalEditMenu = true;
                menuId = '{{ $b->id }}';
                namaMenu = '{{ addslashes($b->nama) }}';
                tahunMenu = '{{ $b->tahun->id }}';
              "
              class="text-blue-600 hover:bg-blue-100 dark:hover:bg-gray-700 rounded-lg px-2 py-1">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                  </svg>
            </button>

            <button 
                    @click="openDeleteModal({{ $b->id }}, '{{ $b->nama }}')" 
                    class="px-2 py-2 text-red-600 hover:text-red-800">
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

  {{-- Tabel Sub Menu --}}
  <h5 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">Sub Menu</h5>
  <div class="w-full overflow-x-auto rounded-lg shadow">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700">
          <th class="px-4 py-3">Nama Sub Menu</th>
          <th class="px-4 py-3">Jumlah</th>
          <th class="px-4 py-3">Menu Utama</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($belanja as $b)
          @foreach ($b->subBelanja as $s)
          <tr class="text-gray-700 dark:text-gray-300">
            <td class="px-4 py-3">{{ $s->nama }}</td>
            <td class="px-4 py-3">Rp {{ number_format($s->jumlah, 2, ',', '.') }}</td>
            <td class="px-4 py-3">{{ $b->nama }}</td>
            <td class="px-4 py-3 flex space-x-2 justify-center">
              <button @click="showModalEditSub = true; subId='{{ $s->id }}'; subNama='{{ addslashes($s->nama) }}'; subJumlah='{{ $s->jumlah }}'; subBelanjaId='{{ $b->id }}';"
                class="text-blue-600 hover:bg-blue-100 dark:hover:bg-gray-700 rounded-lg px-2 py-1">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                  </svg>
              </button>

               <button 
                    @click="openDeleteSubModal({{ $s->id }}, '{{ $s->nama }}')" 
                    class="px-2 py-2 text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </button>

              
            </td>
          </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- ========================== --}}
  {{-- Modal Tambah Menu --}}
  {{-- ========================== --}}
  <div x-show="showModalTambahMenu" class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl">
      <h2 class="text-lg font-semibold mb-4">Tambah Menu</h2>
      <form action="{{ route('belanja.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label>Nama Menu</label>
          <input type="text" name="nama" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Tahun</label>
          <input type="number" name="tahun" min="2000" max="2100" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalTambahMenu = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Edit Menu --}}
  <div x-show="showModalEditMenu" class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl">
      <h2 class="text-lg font-semibold mb-4">Edit Menu</h2>
      <form :action="`/belanja/${menuId}`" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
          <label>Nama Menu</label>
          <input type="text" name="nama" x-model="namaMenu" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Tahun</label>
          <select name="id_tahun" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
            @foreach ($tahun as $t)
              <option value="{{ $t->id }}">{{ $t->tahun }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalEditMenu = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Delete -->
   <div 
    x-show="showModalDelete"
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
    x-show="showModalDelete" 
    style="display: none;"
    x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
    class="bg-white dark:bg-gray-800 rounded-lg  shadow-lg "
  >
    <form x-bind:action="'/belanja/delete/' + menuId " method="POST" class="bg-white p-6 rounded-lg shadow-md w-96">
      @csrf
      @method('DELETE')
      <h3 class="text-lg font-semibold mb-3 text-center">Konfirmasi Hapus</h3>
      <p class="text-center mb-4">Yakin ingin menghapus <span class="font-semibold" x-text="namaMenu"></span>?</p>
      <div class="flex justify-center space-x-2">
        <button type="button" @click="showModalDelete=false" class="px-3 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-3 py-2 bg-blue-600 text-white rounded">Hapus</button>
      </div>
    </form>
  </div>
</div>

  {{-- Modal Tambah Sub Menu --}}
  <div x-show="showModalTambahSub" class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl">
      <h2 class="text-lg font-semibold mb-4">Tambah Sub Menu</h2>
      <form action="{{ route('sub.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label>Menu Utama</label>
          <select name="belanja_desa_id" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
            <option value="">-- Pilih Menu --</option>
            @foreach ($belanja as $b)
              <option value="{{ $b->id }}">{{ $b->nama }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label>Nama Sub Menu</label>
          <input type="text" name="nama" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Jumlah (Rp)</label>
          <input type="number" step="0.01" name="jumlah" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalTambahSub = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Edit Sub Menu --}}
  <div x-show="showModalEditSub" class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl">
      <h2 class="text-lg font-semibold mb-4">Edit Sub Menu</h2>
      <form :action="`/sub-belanja/${subId}`" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
          <label>Nama Sub Menu</label>
          <input type="text" name="nama" x-model="subNama" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Jumlah (Rp)</label>
          <input type="number" step="0.01" name="jumlah" x-model="subJumlah" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalEditSub = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  

   <!-- Modal Delete -->
   <!-- Modal Delete Sub -->
<div 
  x-show="showModalDeleteSub"
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
    x-show="showModalDeleteSub" 
    style="display: none;"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 transform translate-y-1/2"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform translate-y-1/2"
    @click.away="closeModal"
    @keydown.escape="closeModal"
    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg"
  >
    <form :action="`/sub-belanja/delete/${subId}`" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96">
      @csrf
      @method('DELETE')
      <h3 class="text-lg font-semibold mb-3 text-center">Konfirmasi Hapus</h3>
      <p class="text-center mb-4">
        Yakin ingin menghapus <span class="font-semibold" x-text="subNama"></span>?
      </p>
      <div class="flex justify-center space-x-2">
        <button type="button" @click="showModalDeleteSub=false" class="px-3 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-3 py-2 bg-blue-600 text-white rounded">Hapus</button>
      </div>
    </form>
  </div>
</div>


</div>
@endsection
