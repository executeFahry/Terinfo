<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $berita = Berita::with('kategori')->get();
        } else {
            $berita = Berita::with('kategori')->where('id_user', auth()->user()->id_user)->get();
        }

        return view('backend.content.berita.list', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // tambah berita
    {
        $kategori = Kategori::all();

        return view('backend.content.berita.formTambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // proses tambah berita
    {
        $this->validate($request, [
            'judul' => 'required',
            'slug' => 'required|unique:berita,slug',
            'isi' => 'required',
            'gambar' => 'required',
            'id_kategori' => 'required',
        ]);

        $request->file('gambar')->store('public/berita');
        $gambar_berita = $request->file('gambar')->hashName();

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->slug);
        $berita->isi = $request->isi;
        $berita->gambar = $gambar_berita;
        $berita->id_kategori = $request->id_kategori;
        $berita->id_user = auth()->user()->id_user;

        try {
            $berita->save();
            return redirect()->route(auth()->user()->role . '.berita.index')->with('pesan', ['success', 'Berita berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->route(auth()->user()->role . '.berita.index')->with('pesan', ['error', 'Berita gagal ditambahkan']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // ubah berita
    {
        $berita = Berita::findorFail($id);
        $kategori = Kategori::all();
        return view('backend.content.berita.formUbah', compact('berita', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request) // proses ubah berita
    {
        $this->validate($request, [
            'judul' => 'required',
            'slug' => 'required',
            'id_kategori' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // validasi untuk gambar
        ]);

        $berita = Berita::findOrFail($request->id_berita);
        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->slug);
        $berita->isi = $request->isi;
        $berita->id_kategori = $request->id_kategori;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar) {
                Storage::delete('public/berita/' . $berita->gambar);
            }

            // Simpan gambar baru
            $gambar_berita = $request->file('gambar')->store('public/berita');
            $berita->gambar = basename($gambar_berita); // Simpan hanya nama file
        }

        try {
            $berita->save();
            return redirect()->route(auth()->user()->role . '.berita.index')->with('pesan', ['success', 'Berita berhasil diubah']);
        } catch (\Exception $e) {
            return redirect()->route(auth()->user()->role . '.berita.index')->with('pesan', ['error', 'Berita gagal diubah: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // hapus berita
    {
        $berita = Berita::findorFail($id);

        try {
            // Hapus gambar dari storage
            if (Storage::exists('public/berita/' . $berita->gambar)) {
                Storage::delete('public/berita/' . $berita->gambar);
            }

            $berita->delete();
            return redirect()->route(auth()->user()->role . '.berita.index')->with('pesan', ['success', 'Berita berhasil dihapus']);
        } catch (\Exception $e) {
            return redirect()->route(auth()->user()->role . '.berita.index')->with('pesan', ['danger', 'Berita gagal dihapus']);
        }
    }
}
