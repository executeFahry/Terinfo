<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::whereNull('parent_menu')
            ->with(['subMenu' => function ($query) {
                $query->orderBy('urutan_menu', 'asc');
            }])
            ->orderBy('urutan_menu', 'asc')
            ->get();

        return view('backend.content.menu.list', compact('menu'));
    }

    public function order($id_menu, $id_swap)
    {
        $menu = Menu::findOrFail($id_menu);
        $menuOrder = $menu->urutan_menu;

        $menuSwap = Menu::findOrFail($id_swap);
        $menuSwapOrder = $menuSwap->urutan_menu;

        $menu->urutan_menu = $menuSwapOrder;
        $menuSwap->urutan_menu = $menuOrder;

        try {
            $menu->save();
            $menuSwap->save();
            return redirect()->route('admin.menu.index')->with('pesan', ['success', 'Menu berhasil diurutkan']);
        } catch (\Exception $e) {
            return redirect()->route('admin.menu.index')->with('pesan', ['error', 'Menu gagal diurutkan']);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = Menu::whereNull('parent_menu')->where('status_menu', '=', 1)->get();
        return view('backend.content.menu.formTambah', compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_menu' => 'required',
            'jenis_menu' => 'required',
            'target_menu' => 'required',


        ]);

        $parent_menu = $request->parent_menu;
        if ($parent_menu == null) {
            $urut = $this->getUrutanMenu();
        } else {
            $urut = $this->getUrutanMenu($parent_menu);
        }

        $url_menu = "";
        if ($request->jenis_menu == 'url') {
            $url_menu = $request->link_menu;
        }

        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->jenis_menu = $request->jenis_menu;
        $menu->link_menu = $url_menu;
        $menu->target_menu = $request->target_menu;
        $menu->parent_menu = $request->parent_menu;
        $menu->urutan_menu = $urut;

        try {
            $menu->save();
            return redirect()->route('admin.menu.index')->with('pesan', ['success', 'Menu berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->route('admin.menu.index')->with('pesan', ['error', 'Menu gagal ditambahkan']);
        }
    }

    private function getUrutanMenu($parent = null)
    {
        if ($parent == null) {
            $noUrutMenu = null;
            $urutMenu = Menu::select('urutan_menu')->whereNull('parent_menu')->orderBy('urutan_menu', 'desc')->first();

            if ($urutMenu != null) {
                $noUrutMenu = $urutMenu->urutan_menu + 1;
            } else {
                $noUrutMenu =   1;
            }
            return $noUrutMenu;
        } else {
            $noUrutSubMenu = null;
            $urutSubMenu = Menu::select('urutan_menu')
                ->whereNotNull('parent_menu')
                ->where('parent_menu', '=', $parent)
                ->orderBy('urutan_menu', 'desc')
                ->first();

            if ($urutSubMenu != null) {
                $noUrutSubMenu = $urutSubMenu->urutan_menu + 1;
            } else {
                $noUrutSubMenu = 1;
            }
            return $noUrutSubMenu;
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
    public function edit($id)
    {
        $parent = Menu::whereNull('parent_menu')->where('status_menu', '=', 1)->get();
        $menu = Menu::findOrFail($id);
        return view('backend.content.menu.formUbah', compact('parent', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id_menu' => 'required',
            'nama_menu' => 'required',
            'jenis_menu' => 'required',
            'target_menu' => 'required',


        ]);

        $url_menu = "";
        if ($request->jenis_menu == 'url') {
            $url_menu = $request->link_menu;
        }

        $menu = Menu::findOrFail($request->id_menu);
        $menu->nama_menu = $request->nama_menu;
        $menu->jenis_menu = $request->jenis_menu;
        $menu->link_menu = $url_menu;
        $menu->target_menu = $request->target_menu;
        $menu->parent_menu = $request->parent_menu;
        $menu->status_menu = $request->status_menu;

        try {
            $menu->save();
            return redirect()->route('admin.menu.index')->with('pesan', ['success', 'Menu berhasil diubah']);
        } catch (\Exception $e) {
            return redirect()->route('admin.menu.index')->with('pesan', ['error', 'Menu gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        try {
            $menu->delete();
            return redirect()->route('admin.menu.index')->with('pesan', ['success', 'Menu berhasil dihapus']);
        } catch (\Exception $e) {
            return redirect()->route('admin.menu.index')->with('pesan', ['error', 'Menu gagal dihapus']);
        }
    }
}
