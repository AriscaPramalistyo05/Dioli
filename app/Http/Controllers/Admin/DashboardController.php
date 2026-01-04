<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Menu;
use App\Models\Pesan;
use App\Models\Blog;
use App\Models\Koki;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics counts
        $totalUsers = User::count();
        $totalMenus = Menu::count();
        $totalOrders = Pesan::count();
        $totalBlogs = Blog::count();
        $totalChefs = Koki::count();

        // Recent orders (5 latest)
        $recentOrders = Pesan::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Menu count by category
        $menuByCategory = Menu::selectRaw('kategori, COUNT(*) as count')
            ->groupBy('kategori')
            ->get()
            ->pluck('count', 'kategori')
            ->toArray();

        // Ensure all categories are present
        $allCategories = ['Murah', 'Ekonomi', 'Premium', 'Snack', 'Minuman'];
        foreach ($allCategories as $category) {
            if (!isset($menuByCategory[$category])) {
                $menuByCategory[$category] = 0;
            }
        }

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalMenus',
            'totalOrders',
            'totalBlogs',
            'totalChefs',
            'recentOrders',
            'menuByCategory'
        ));
    }
}
