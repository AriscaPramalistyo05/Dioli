<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // public function AdminDashboard()
    // {
    //     return view('admin.index');
    // }

    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    // Hapus Users
    public function deleteUser($id)
    {
        $user = User::findOrFail($id); // Temukan pengguna berdasarkan ID
        $user->delete(); // Hapus pengguna

        return redirect()->back()->with('success', "User '{$user}' deleted successfully");
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    }
    // Edit User
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user'));
    }
    // Update Users
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    // Create Users
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'usertype' => 'required|in:0,1',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    // Menu
    public function chef()
    {
        return view('admin.adminchef');
    }
}
