@extends('admin.layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Tambah Pengguna
  </h2>

  <form action="{{ route('pengguna.store') }}" method="POST"
        class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf
    <div class="mb-4">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Nama Pengguna</span>
        <input type="text" name="nm_pengguna" class="block w-full mt-1 text-sm form-input" requiblue />
      </label>
    </div>

    <div class="mb-4">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Username</span>
        <input type="text" name="username" class="block w-full mt-1 text-sm form-input" requiblue />
      </label>
    </div>

    <div class="mb-4">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Password</span>
        <input type="password" name="password" class="block w-full mt-1 text-sm form-input" requiblue />
      </label>
    </div>

    <div class="mb-4">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Role</span>
        <select name="role" class="block w-full mt-1 text-sm form-select" requiblue>
          <option value="admin">Admin</option>
          <option value="superadmin">Superadmin</option>
        </select>
      </label>
    </div>

    <div class="mb-4">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Status</span>
        <select name="status" class="block w-full mt-1 text-sm form-select" requiblue>
          <option value="aktif">Aktif</option>
          <option value="nonaktif">Nonaktif</option>
        </select>
      </label>
    </div>

    <div class="flex justify-end">
      <button type="submit"
        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
        Simpan
      </button>
    </div>
  </form>
@endsection
