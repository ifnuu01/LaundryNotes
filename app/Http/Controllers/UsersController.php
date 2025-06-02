<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->orderBy('created_at', 'desc')->get();
        return view('kasir.list-kasir', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'kasir',
        ]);

        return redirect()->route('kasir.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.list-users')->with('error', 'Data tidak ditemukan');
        }
        return view('kasir.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('kasir.index')->with('error', 'Data tidak ditemukan');
        }
        return view('kasir.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('kasir.index')->with('error', 'Data tidak ditemukan');
        }
        $request->validate([
            'nama' => 'required|string|max:100',
            'password' => 'nullable|string|min:8',

        ]);

        $user->update([
            'nama' => $request->nama,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('kasir.index')->with('success', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('kasir.index')->with('error', 'Data tidak ditemukan');
        }
        // ubah email jadi null
        $user->update([
            'email' => null,
        ]);
        $user->delete();
        return redirect()->route('kasir.index')->with('success', 'User berhasil dihapus');
    }
}
