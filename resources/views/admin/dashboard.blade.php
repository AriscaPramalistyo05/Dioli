@extends('admin.layouts.tailwind-master')

@section('title', 'Dashboard')

@section('content')
<!-- Header -->
<div class="mb-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
            <p class="mt-1 text-sm text-gray-500">
                Selamat datang kembali, {{ Auth::user()->name ?? 'Admin' }}! 
                <span class="text-gray-400">{{ now()->format('l, d F Y') }}</span>
            </p>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
    @include('admin.components.stat-card', [
        'title' => 'Total Users',
        'value' => $totalUsers,
        'icon' => 'users',
        'color' => 'cyan',
        'link' => route('admin.user.index')
    ])
    
    @include('admin.components.stat-card', [
        'title' => 'Total Menu',
        'value' => $totalMenus,
        'icon' => 'menu',
        'color' => 'green',
        'link' => route('admin.menu.index')
    ])
    
    @include('admin.components.stat-card', [
        'title' => 'Total Pesanan',
        'value' => $totalOrders,
        'icon' => 'orders',
        'color' => 'purple',
        'link' => route('pesan.index')
    ])
    
    @include('admin.components.stat-card', [
        'title' => 'Total Blog',
        'value' => $totalBlogs,
        'icon' => 'blog',
        'color' => 'orange',
        'link' => route('admin.blog.index')
    ])
</div>

<!-- Quick Actions -->
<div class="mb-8">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h2>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <a href="{{ route('admin.menu.create') }}" 
           class="flex items-center gap-3 p-4 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-primary-200 transition-all">
            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-700">Tambah Menu</span>
        </a>
        
        <a href="{{ route('admin.blog.create') }}" 
           class="flex items-center gap-3 p-4 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-primary-200 transition-all">
            <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-700">Tambah Blog</span>
        </a>
        
        <a href="{{ route('pesan.index') }}" 
           class="flex items-center gap-3 p-4 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-primary-200 transition-all">
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-700">Lihat Pesanan</span>
        </a>
        
        <a href="{{ route('admin.user.index') }}" 
           class="flex items-center gap-3 p-4 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-primary-200 transition-all">
            <div class="w-10 h-10 rounded-lg bg-cyan-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-700">Kelola Users</span>
        </a>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Orders -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Pesanan Terbaru</h3>
                    <a href="{{ route('pesan.index') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                        Lihat Semua
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if($recentOrders->count() > 0)
                <div class="space-y-4">
                    @foreach($recentOrders as $order)
                    <div class="flex items-start gap-4 p-4 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center flex-shrink-0">
                            <span class="text-primary-600 font-semibold text-sm">
                                {{ strtoupper(substr($order->user->name ?? $order->name ?? 'G', 0, 1)) }}
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $order->user->name ?? $order->name ?? 'Guest' }}
                                </p>
                                <span class="text-xs text-gray-500">
                                    {{ $order->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                    </svg>
                                    {{ $order->phone }}
                                </span>
                            </p>
                            <p class="text-sm text-gray-500 mt-1">
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($order->date)->format('d M Y') }} - {{ $order->time }}
                                </span>
                            </p>
                            <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $order->note }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada pesanan</h3>
                    <p class="mt-1 text-sm text-gray-500">Pesanan baru akan muncul di sini.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Menu by Category -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Menu per Kategori</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @php
                        $categoryColors = [
                            'Murah' => 'bg-green-500',
                            'Ekonomi' => 'bg-blue-500',
                            'Premium' => 'bg-purple-500',
                            'Snack' => 'bg-yellow-500',
                            'Minuman' => 'bg-cyan-500',
                        ];
                        $maxCount = max($menuByCategory) ?: 1;
                    @endphp
                    
                    @foreach(['Murah', 'Ekonomi', 'Premium', 'Snack', 'Minuman'] as $category)
                    @php
                        $count = $menuByCategory[$category] ?? 0;
                        $percentage = ($count / $maxCount) * 100;
                    @endphp
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">{{ $category }}</span>
                            <span class="text-sm text-gray-500">{{ $count }} item</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="{{ $categoryColors[$category] }} h-2 rounded-full transition-all duration-500" 
                                 style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-900">Total Menu</span>
                        <span class="text-lg font-bold text-primary-600">{{ $totalMenus }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
