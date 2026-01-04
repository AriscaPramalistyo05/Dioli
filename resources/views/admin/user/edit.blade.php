@extends('admin.layouts.tailwind-master')

@section('title', 'Edit User')

@section('content')
    <div class="max-w-2xl">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit User</h1>
        </div>

        <div class="bg-white rounded-lg shadow">
            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('name') border-red-500 @enderror"
                        id="name" name="name" value="{{ $user->name }}" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('email') border-red-500 @enderror"
                        id="email" name="email" value="{{ $user->email }}" required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('password') border-red-500 @enderror"
                        id="password" name="password" placeholder="Biarkan tetap kosong jika tidak diubah">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input type="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                        id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru">
                </div>

                <div class="mb-6">
                    <label for="usertype" class="block text-sm font-medium text-gray-700 mb-2">User Type</label>
                    <select
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('usertype') border-red-500 @enderror"
                        id="usertype" name="usertype" required>
                        <option value="">-- Pilih Tipe User --</option>
                        <option value="0" {{ $user->usertype == 0 ? 'selected' : '' }}>User</option>
                        <option value="1" {{ $user->usertype == 1 ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('usertype')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium">Update</button>
                    <a href="{{ route('admin.user.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 font-medium">Batal</a>
                    @if ($user->usertype == '0')
                        <button type="button"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 font-medium ml-auto"
                            onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')">Hapus</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete Confirmation -->
    <div id="deleteConfirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        onclick="if(event.target === this) document.getElementById('deleteConfirmModal').classList.add('hidden')">
        <div class="bg-white rounded-lg shadow-xl max-w-sm w-full mx-4">
            <div class="px-6 py-4">
                <h3 class="text-lg font-medium text-gray-900">Hapus User</h3>
                <p class="mt-2 text-sm text-gray-500">Apakah Anda yakin ingin menghapus user <strong
                        id="deleteUserName"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('deleteConfirmModal').classList.add('hidden')"
                    class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(userId, userName) {
            document.getElementById('deleteUserName').textContent = userName;
            const form = document.getElementById('deleteForm');
            form.action = `/admin/user/${userId}`;
            document.getElementById('deleteConfirmModal').classList.remove('hidden');
        }
    </script>
@endsection
