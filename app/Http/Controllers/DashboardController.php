<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKategori = Kategori::count();

        if (auth()->user()->role == 'admin') {
            $totalBerita = Berita::count(); // Total berita untuk admin
            $latestBerita = Berita::latest()->take(6)->get(); // Ambil 6 berita terbaru untuk admin
            $totalUser = User::count(); // Total user hanya untuk admin
        } elseif (auth()->user()->role == 'penulis') {
            $userId = auth()->user()->id_user;
            $totalBerita = Berita::where('id_user', $userId)->count(); // Total berita yang ditulis oleh penulis
            $latestBerita = Berita::where('id_user', $userId)->latest()->take(6)->get(); // Ambil 6 berita terbaru oleh penulis
            $totalUser = null; // Tidak menghitung total user untuk penulis
        } else {
            $totalBerita = null; // Tidak menghitung total berita untuk user biasa
            $latestBerita = Berita::latest()->take(6)->get(); // Ambil 6 berita terbaru untuk user biasa
            $totalUser = null; // Tidak menghitung total user untuk user biasa
        }

        return view('backend.content.dashboard', compact('totalKategori', 'totalBerita', 'totalUser', 'latestBerita'));
    }


    public function profile()
    {
        $id = Auth::guard('web')->user()->id_user;
        $user = User::findOrFail($id);

        return view('backend.content.profile', compact('user'));
    }

    public function resetPassword()
    {
        return view('backend.content.resetPassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'c_new_password' => 'required_with:new_password|same:new_password|min:8'
        ]);

        $old_password = $request->old_password;
        $new_password = $request->new_password;

        $id = Auth::guard('web')->user()->id_user; // Mengambil id user yang sedang login
        $user = User::findOrFail($id); // Mengambil data user berdasarkan id

        if (Hash::check($old_password, $user->password)) {
            $user->password = bcrypt($new_password);

            try {
                $user->save();
                return redirect()->route(auth()->user()->role . '.dashboard.resetPassword')->with('success', 'Password berhasil diubah');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Password gagal diubah');
            }
        } else {
            return redirect()->back()->with('error', 'Password lama salah');
        }
    }
}
