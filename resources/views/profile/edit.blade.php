@extends('admin.layouts.tailwind-master')

@section('title', 'Profile Settings')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">{{ __('Profile Settings') }}</h1>
            <p class="mt-1 text-sm text-gray-500">Kelola informasi profil dan preferensi keamanan Anda</p>
        </div>

        <div class="space-y-6">
            <!-- Update Profile Information -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Informasi Profil</h2>
                    <p class="mt-1 text-sm text-gray-500">Perbarui informasi profil dan alamat email Anda</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Perbarui Password</h2>
                    <p class="mt-1 text-sm text-gray-500">Pastikan akun Anda menggunakan password yang panjang dan acak
                        untuk tetap aman</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white rounded-lg shadow border border-red-100">
                <div class="px-6 py-4 border-b border-red-200">
                    <h2 class="text-lg font-semibold text-red-900">Hapus Akun</h2>
                    <p class="mt-1 text-sm text-red-700">Setelah akun Anda dihapus, tidak ada jalan untuk mengembalikannya.
                        Pastikan Anda yakin</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
