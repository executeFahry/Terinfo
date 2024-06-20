<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Menu;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();

        return view('backend.content.kategori.list', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // tambah kategori
    {
        return view('backend.content.kategori.formTambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // proses tambah kategori
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            return redirect()->route('admin.kategori.index')->with('pesan', ['success', 'Kategori berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->route('admin.kategori.index')->with('pesan', ['danger', 'Kategori gagal ditambahkan']);
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
    public function edit($id) // edit kategori
    {
        $kategori = Kategori::findorFail($id);
        return view('backend.content.kategori.formUbah', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) // proses edit kategori
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($request->id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            return redirect()->route('admin.kategori.index')->with('pesan', ['success', 'Kategori berhasil diubah']);
        } catch (\Exception $e) {
            return redirect()->route('admin.kategori.index')->with('pesan', ['danger', 'Kategori gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // hapus kategori
    {
        $kategori = Kategori::findOrFail($id);

        try {
            $kategori->delete();
            return redirect()->route('admin.kategori.index')->with('pesan', ['success', 'Kategori berhasil dihapus']);
        } catch (\Exception $e) {
            return redirect()->route('admin.kategori.index')->with('pesan', ['danger', 'Kategori gagal dihapus']);
        }
    }
}
