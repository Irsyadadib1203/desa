@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
  <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4">Tambah Berita</h2>

   <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <input type="text" name="judul_berita" placeholder="Judul Berita" class="w-full px-4 py-2 border rounded-lg" requiblue>
      <input type="date" name="tgl_rilis" class="w-full px-4 py-2 border rounded-lg">
    </div>
    <textarea name="isi_berita" placeholder="Isi Berita" rows="4" class="w-full mt-4 px-4 py-2 border rounded-lg" requiblue></textarea>
    <input type="file" name="gambar" class="mt-4 w-full border rounded-lg">
    <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Tambah Berita</button>
  </form>
</div>
@endsection
