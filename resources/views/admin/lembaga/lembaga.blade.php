@extends('admin.layouts.app')

@section('title', 'Belanja Desa')

@section('content')
<div 
  x-data="{
    showModalTambahLembaga: false,
    showModalEditLembaga: false,
    showModalTambahPengurus: false,
    showModalEditPengurus: false,
    showModalTambahAnggota: false,
    showModalEditAnggota: false,
    showModalHapusLembaga: false,
    showModalHapusPengurus: false,
    showModalHapusAnggota: false,

    lembagaId: '', namaLembaga: '', kodeLembaga: '', kategoriLembaga: '', noSkLembaga: '', keteranganLembaga: '',
    pengurusId: '', namaPengurus: '', jabatanPengurus: '', alamatPengurus: '',
    anggotaId: '', namaAnggota: '', jenisKelaminAnggota: '', alamatAnggota: '',
  }"
  class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 relative"
>
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Data Lembaga Desa
  </h4>

  {{-- Filter Lembaga --}}
  <form method="GET" action="{{ route('lembaga') }}" class="flex items-center space-x-3 mb-6">
    <select name="lembaga_id" onchange="this.form.submit()" class="border rounded-lg p-2 dark:bg-gray-700 dark:text-gray-200">
      <option value="">-- Semua Lembaga --</option>
      @foreach ($lembagas as $l)
        <option value="{{ $l->id }}" {{ $selected == $l->id ? 'selected' : '' }}>
          {{ $l->nama }}
        </option>
      @endforeach
    </select>
    <button type="button" @click="showModalTambahLembaga = true"
      class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
      + Tambah Lembaga
    </button>
    <button type="button" @click="showModalTambahPengurus = true"
      class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
      + Tambah Pengurus
    </button>
    <button type="button" @click="showModalTambahAnggota = true"
      class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
      + Tambah Anggota
    </button>
  </form>

  {{-- ======================= --}}
  {{-- TABEL LEMBAGA --}}
  {{-- ======================= --}}
  <h5 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">Data Lembaga</h5>
  <div class="w-full overflow-x-auto rounded-lg shadow mb-8">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700">
          <th class="px-4 py-3">Nama Lembaga</th>
          <th class="px-4 py-3">Kode</th>
          <th class="px-4 py-3">Kategori</th>
          <th class="px-4 py-3">Keterangan</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($lembagas as $l)
        <tr class="text-gray-700 dark:text-gray-300">
          <td class="px-4 py-3">{{ $l->nama }}</td>
          <td class="px-4 py-3">{{ $l->kode }}</td>
          <td class="px-4 py-3">{{ $l->kategori }}</td>
          <td class="px-4 py-3">{{ $l->keterangan }}</td>
          <td class="px-4 py-3 flex space-x-2 justify-center">
            <button 
              @click="
                showModalEditLembaga = true;
                lembagaId = '{{ $l->id }}';
                namaLembaga = '{{ addslashes($l->nama) }}';
                kodeLembaga = '{{ addslashes($l->kode) }}';
                noSkLembaga = '{{ addslashes($l->no_sk) }}';
                kategoriLembaga = '{{ addslashes($l->kategori) }}';
                keteranganLembaga = '{{ addslashes($l->keterangan) }}';
              "
              class="text-blue-600 hover:bg-blue-100 dark:hover:bg-gray-700 rounded-lg px-2 py-1">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
              </svg>
            </button>

            <button type="button" @click="showModalHapusLembaga = true"
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

  {{-- ======================= --}}
  {{-- TABEL PENGURUS --}}
  {{-- ======================= --}}
  <h5 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">Pengurus</h5>
  <div class="w-full overflow-x-auto rounded-lg shadow">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700">
          <th class="px-4 py-3">Nama Pengurus</th>
          <th class="px-4 py-3">Jabatan Pengurus</th>
          <th class="px-4 py-3">Alamat Pengurus</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($lembagas as $l)
          @foreach ($l->pengurus as $p)
          <tr class="text-gray-700 dark:text-gray-300">
            <td class="px-4 py-3">{{ $p->nama }}</td>
            <td class="px-4 py-3">{{ $p->jabatan }}</td>
            <td class="px-4 py-3">{{ $p->alamat }}</td>
            <td class="px-4 py-3 flex space-x-2 justify-center">
              <button 
                @click="
                  showModalEditPengurus = true;
                  pengurusId='{{ $p->id }}';
                  namaPengurus='{{ addslashes($p->nama) }}';
                  jabatanPengurus='{{ addslashes($p->jabatan) }}';
                  alamatPengurus='{{ addslashes($p->alamat) }}';
                "
                class="text-blue-600 hover:bg-blue-100 dark:hover:bg-gray-700 rounded-lg px-2 py-1">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                </svg>
              </button>

              <button type="button" @click="showModalHapusPengurus = true"
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
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- ======================= --}}
  {{-- TABEL ANGGOTA --}}
  {{-- ======================= --}}
  <h5 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">Anggota</h5>
  <div class="w-full overflow-x-auto rounded-lg shadow">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700">
          <th class="px-4 py-3">No Anggota</th>
          <th class="px-4 py-3">Nama Anggota</th>
          <th class="px-4 py-3">Alamat Anggota</th>
          <th class="px-4 py-3">Jenis Kelamin Anggota</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($lembagas as $l)
          @foreach ($l->anggota as $a)
          <tr class="text-gray-700 dark:text-gray-300">
            <td class="px-4 py-3">{{ $a->id }}</td>
            <td class="px-4 py-3">{{ $a->nama }}</td>
            <td class="px-4 py-3">{{ $a->alamat }}</td>
            <td class="px-4 py-3">{{ $a->jenis_kelamin }}</td>
            <td class="px-4 py-3 flex space-x-2 justify-center">
              <button 
                @click="
                  showModalEditAnggota = true;
                  anggotaId='{{ $a->id }}';
                  namaAnggota='{{ addslashes($a->nama) }}';
                  alamatAnggota='{{ addslashes($a->alamat) }}';
                  jenisKelaminAnggota='{{ addslashes($a->jenis_kelamin) }}';
                "
                class="text-blue-600 hover:bg-blue-100 dark:hover:bg-gray-700 rounded-lg px-2 py-1">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                </svg>
              </button>

              <button type="button" @click="showModalHapusAnggota = true"
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
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- ========================== --}}
  {{-- Modal Tambah Lembaga --}}
  {{-- ========================== --}}
  <div x-show="showModalTambahLembaga" x-cloak x-transition class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl p-6" x-trap="showModalTambahLembaga">
      <h2 class="text-lg font-semibold mb-4">Tambah Lembaga</h2>
      <form action="{{ route('lembaga.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label>Nama Lembaga</label>
          <input type="text" name="nama" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Kode Lembaga</label>
          <input type="text" name="kode" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>No SK Pendidikan</label>
          <input type="text" name="no_sk" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Kategori Lembaga</label>
          <input type="text" name="kategori" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Keterangan Lembaga</label>
          <textarea name="keterangan" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue @keydown.enter.prevent></textarea>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalTambahLembaga = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Edit Lembaga --}}
  <div x-show="showModalEditLembaga" x-cloak x-transition class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl p-6" x-trap="showModalEditLembaga">
      <h2 class="text-lg font-semibold mb-4">Edit Lembaga</h2>
      <form :action="`/lembaga/update/${lembagaId}`" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
          <label>Nama Lembaga</label>
          <input type="text" name="nama" x-model="namaLembaga" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Kode Lembaga</label>
          <input type="text" name="kode" x-model="kodeLembaga" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>No SK Pendidikan</label>
          <input type="text" name="no_sk" x-model="noSkLembaga" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Kategori Lembaga</label>
          <input type="text" name="kategori" x-model="kategoriLembaga" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Keterangan Lembaga</label>
          <textarea name="keterangan" x-model="keteranganLembaga" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue @keydown.enter.prevent></textarea>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalEditLembaga = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Tambah Pengurus --}}
  <div x-show="showModalTambahPengurus" x-cloak class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl p-6">
      <h2 class="text-lg font-semibold mb-4">Tambah Pengurus</h2>
      <form action="{{ route('pengurus.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label>Lembaga</label>
          <select name="lembaga_id" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
            <option value="">-- Pilih Lembaga --</option>
            @foreach ($lembagas as $l)
              <option value="{{ $l->id }}">{{ $l->nama }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label>Nama Pengurus</label>
          <input type="text" name="nama" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Alamat</label>
          <input type="text" name="alamat" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalTambahPengurus = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Edit Pengurus --}}
  <div x-show="showModalEditPengurus" x-cloak class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl p-6">
      <h2 class="text-lg font-semibold mb-4">Edit Pengurus</h2>
      <form :action="`/pengurus/update/${pengurusId}`" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
          <label>Nama Pengurus</label>
          <input type="text" name="nama" x-model="namaPengurus" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Jabatan</label>
          <input type="text" name="jabatan" x-model="jabatanPengurus" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Alamat</label>
          <input type="text" name="alamat" x-model="alamatPengurus" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalEditPengurus = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Tambah Anggota --}}
  <div x-show="showModalTambahAnggota" x-cloak class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl p-6">
      <h2 class="text-lg font-semibold mb-4">Tambah Anggota</h2>
      <form action="{{ route('anggota.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label>Lembaga</label>
          <select name="lembaga_id" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
            <option value="">-- Pilih Lembaga --</option>
            @foreach ($lembagas as $l)
              <option value="{{ $l->id }}">{{ $l->nama }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label>No Anggota</label>
          <input type="text" name="id" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Nama Anggota</label>
          <input type="text" name="nama" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Alamat</label>
          <input type="text" name="alamat" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalTambahAnggota = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Edit Anggota --}}
  <div x-show="showModalEditAnggota" x-cloak class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-4xl p-6">
      <h2 class="text-lg font-semibold mb-4">Edit Anggota</h2>
      <form :action="`/anggota/update/${anggotaId}`" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
          <label>No Anggota</label>
          <input type="text" name="id" x-model="anggotaId" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Nama Anggota</label>
          <input type="text" name="nama" x-model="namaAnggota" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Alamat</label>
          <input type="text" name="alamat" x-model="alamatAnggota" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
        </div>
        <div>
          <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" x-model="jenisKelaminAnggota" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200" requiblue>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModalEditAnggota = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <div 
    x-show="showModalHapusLembaga"
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
    x-show="showModalHapusLembaga"
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
        Apakah kamu yakin ingin menghapus Lembaga ini? Tindakan ini tidak bisa dibatalkan.
      </p>
      <div class="flex justify-end space-x-3">
        <button type="button" @click="showModalHapusLembaga = false"
          class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600">
          Batal
        </button>

        <form action="{{ route('lembaga.destroy', $l->id) }}" method="POST">
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

  <div 
    x-show="showModalHapusPengurus"
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
    x-show="showModalHapusPengurus"
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
        Apakah kamu yakin ingin menghapus Pengurus ini? Tindakan ini tidak bisa dibatalkan.
      </p>
      <div class="flex justify-end space-x-3">
        <button type="button" @click="showModalHapusPengurus = false"
          class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600">
          Batal
        </button>

        <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST">
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

  <div 
    x-show="showModalHapusAnggota"
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
    x-show="showModalHapusAnggota"
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
        Apakah kamu yakin ingin menghapus Anggota ini? Tindakan ini tidak bisa dibatalkan.
      </p>
      <div class="flex justify-end space-x-3">
        <button type="button" @click="showModalHapusAnggota = false"
          class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600">
          Batal
        </button>

        <form action="{{ route('anggota.destroy', $a->id) }}" method="POST">
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
