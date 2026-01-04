@extends('admin.layouts.tailwind-master')

@section('title', 'Edit Menu')

@section('content')
<!-- Header -->
<div class="mb-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.menu.index') }}" 
           class="p-2 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Menu</h1>
            <p class="mt-1 text-sm text-gray-500">Perbarui informasi menu "{{ $menu->title }}"</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-2xl">
    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="p-6 space-y-6">
            <!-- Current Image Preview -->
            @if($menu->gambar)
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                <img src="{{ Storage::url($menu->gambar) }}" 
                     alt="{{ $menu->title }}" 
                     class="h-20 w-20 rounded-lg object-cover">
                <div>
                    <p class="text-sm font-medium text-gray-900">Gambar Saat Ini</p>
                    <p class="text-sm text-gray-500">Upload gambar baru untuk mengganti</p>
                </div>
            </div>
            @endif
            
            @include('admin.components.form-input', [
                'name' => 'title',
                'label' => 'Nama Menu',
                'value' => $menu->title,
                'placeholder' => 'Masukkan nama menu',
                'required' => true
            ])
            
            @include('admin.components.form-textarea', [
                'name' => 'deskripsi',
                'label' => 'Deskripsi',
                'value' => $menu->deskripsi,
                'placeholder' => 'Masukkan deskripsi menu',
                'rows' => 3,
                'required' => true
            ])
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @include('admin.components.form-input', [
                    'name' => 'harga',
                    'label' => 'Harga',
                    'type' => 'number',
                    'value' => $menu->harga,
                    'placeholder' => '0',
                    'icon' => 'currency',
                    'required' => true
                ])
                
                @include('admin.components.form-select', [
                    'name' => 'kategori',
                    'label' => 'Kategori',
                    'selected' => $menu->kategori,
                    'options' => [
                        'Murah' => 'Murah',
                        'Ekonomi' => 'Ekonomi',
                        'Premium' => 'Premium',
                        'Snack' => 'Snack',
                        'Minuman' => 'Minuman'
                    ],
                    'required' => true
                ])
            </div>
            
            @include('admin.components.form-file', [
                'name' => 'gambar',
                'label' => 'Gambar Menu Baru',
                'hint' => 'Kosongkan jika tidak ingin mengubah gambar'
            ])
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
            <a href="{{ route('admin.menu.index') }}"
               class="rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit"
                    class="rounded-lg bg-primary-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-700 transition-colors">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
