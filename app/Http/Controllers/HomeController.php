<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Koki;



class HomeController extends Controller
{
    public function index()
    {
        return view("homepage");
    }

    public function redirects()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') // Jika usertype adalah admin
        {
            $data = User::all(); // Mengambil semua pengguna
            return view('admin.adminmaster', compact('data'));
        } else {
            return view('homepage');
        }
    }

    // public function showKokis()
    // {
    //     $kokis = Koki::all();
    //     return view('homepage', compact('kokis'));
    // }



    // public function menus()
    // {
    //     return view('admin.menus');
    // }
}
