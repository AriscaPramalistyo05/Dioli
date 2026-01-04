@extends('admin.layouts.tailwind-master')

@section('title', 'Edit Chef')

@section('content')
    <div class="max-w-2xl">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit Koki</h1>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.koki.update', ['id' => $koki->id]) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        id="name" name="name" value="{{ $koki->nama }}" required>
                </div>

                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        id="position" name="position" value="{{ $koki->jabatan }}" required>
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                    <input type="file"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        id="photo" name="photo" accept="image/*">
                </div>

                <div>
                    <label for="instagram" class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        id="instagram" name="instagram" value="{{ $koki->instagram }}">
                </div>

                <div>
                    <label for="facebook" class="block text-sm font-medium text-gray-700 mb-2">Facebook</label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        id="facebook" name="facebook" value="{{ $koki->facebook }}">
                </div>

                <div>
                    <label for="x" class="block text-sm font-medium text-gray-700 mb-2">X (Pengganti Twitter)</label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        id="x" name="x" value="{{ $koki->x }}">
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium">Simpan
                        Perubahan</button>
                    <a href="{{ route('admin.koki.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 font-medium">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
