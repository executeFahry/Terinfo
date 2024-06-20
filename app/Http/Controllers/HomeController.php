<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Berita;
use App\Models\Kategori;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        # Halaman Awal
        $menu = $this->getMenu();
        $latestNews = Berita::with('kategori', 'user')->withCount('komentar')->latest()->take(4)->get();
        $homeLatestNews = Berita::with('kategori', 'user')->withCount('komentar')->latest()->take(6)->get();
        $kategoriAll = Kategori::all();
        $mostViewedNews = Berita::with('kategori', 'user')->withCount('komentar')->orderByDesc('total_views')->take(5)->get();
        $footerMostViewedNews = Berita::withCount('komentar')->orderByDesc('total_views')->take(3)->get();

        return view('frontend.content.home', compact('menu', 'latestNews', 'homeLatestNews', 'kategoriAll', 'mostViewedNews', 'footerMostViewedNews'));
    }


    public function detailBerita($slug)
    {
        # Halaman Detail Berita
        $menu = $this->getMenu();
        $berita = Berita::with(['user', 'komentar'])->where('slug', $slug)->firstOrFail();
        $kategoriAll = Kategori::all();

        // Menambahkan total views
        $berita->total_views = $berita->total_views + 1;
        $berita->save();

        $mostViewedNews = Berita::with('kategori', 'user')->orderByDesc('total_views')->take(3)->get();
        $mostViewedNewsSide = Berita::with('kategori', 'user')->orderByDesc('total_views')->take(6)->get();
        $footerMostViewedNews = Berita::orderByDesc('total_views')->take(3)->get();

        // Hitung total komentar
        $berita->komentar_count = $berita->komentar->count();

        return view('frontend.content.detailBerita', compact('menu', 'berita', 'kategoriAll', 'mostViewedNews', 'mostViewedNewsSide', 'footerMostViewedNews'));
    }

    public function semuaBerita()
    {
        # Halaman Untuk Menampilkan Semua Berita
        $menu = $this->getMenu();
        $berita = Berita::with('kategori', 'user')->withCount('komentar')->latest()->paginate(6); // Menggunakan pagination
        $kategoriAll = Kategori::all(); // Mengambil semua kategori
        $footerMostViewedNews = Berita::withCount('komentar')->orderByDesc('total_views')->take(3)->get();

        return view('frontend.content.semuaBerita', compact('menu', 'berita', 'kategoriAll', 'footerMostViewedNews'));
    }

    public function showBeritaByKategori($nama_kategori)
    {
        $menu = $this->getMenu();
        $kategoriAll = Kategori::all();
        $kategori = Kategori::where('nama_kategori', $nama_kategori)->firstOrFail();
        $beritaByKategori = $kategori->berita()->withCount('komentar')->paginate(6); // Ambil 6 berita berdasarkan kategori yang dipilih
        $mostViewedNews = Berita::with('kategori', 'user')->withCount('komentar')->orderByDesc('total_views')->take(5)->get(); // Mendapatkan berita berdasarkan total views
        $footerMostViewedNews = Berita::withCount('komentar')->orderByDesc('total_views')->take(3)->get(); // Mendapatkan berita berdasarkan total views

        return view('frontend.content.beritaByKategori', compact('menu', 'kategoriAll', 'kategori', 'beritaByKategori', 'mostViewedNews', 'footerMostViewedNews'));
    }

    private function getMenu()
    {
        $menu = Menu::whereNull('parent_menu')
            ->with(['subMenu' => function ($query) {
                $query->where('status_menu', '=', '1')->orderBy('urutan_menu', 'asc');
            }])
            ->where('status_menu', '=', '1')
            ->orderBy('urutan_menu', 'asc')
            ->get();

        $dataMenu = []; // Menampung data menu

        foreach ($menu as $key) {
            $jenis_menu = $key->jenis_menu;
            $linkMenu = "";

            if ($jenis_menu == "link") {
                $linkMenu = $key->link_menu;
            } else {
                $linkMenu = route('home.beritaByKategori', $key->link_menu);
            }

            $dItemMenu = []; // Menampung data item menu
            foreach ($key->subMenu as $sub) {
                $jenisItemMenu = $sub->jenis_menu;
                $linkItemMenu = "";

                if ($jenisItemMenu == "link") {
                    $linkItemMenu = $sub->link_menu;
                } else {
                    $linkItemMenu = route('home.beritaByKategori', $sub->link_menu);
                }

                $dItemMenu[] = [
                    'sub_menu_nama' => $sub->nama_menu,
                    'sub_menu_target' => $sub->target_menu,
                    'sub_menu_link' => $linkItemMenu,
                ];
            }

            $dataMenu[] = [
                'menu' => $key->nama_menu,
                'target' => $key->target_menu,
                'link' => $linkMenu,
                'itemMenu' => $dItemMenu,
            ];
        }

        return $dataMenu;
    }

    public function contact()
    {
        # Halaman Contact
        $menu = $this->getMenu();
        $kategoriAll = Kategori::all();
        $mostViewedNews = Berita::with('kategori', 'user')->orderByDesc('total_views')->take(5)->get();
        $footerMostViewedNews = Berita::orderByDesc('total_views')->take(3)->get();

        return view('frontend.content.contact', compact('menu', 'kategoriAll', 'mostViewedNews', 'footerMostViewedNews'));
    }

    public function aboutUs()
    {
        # Halaman About
        $menu = $this->getMenu();
        $kategoriAll = Kategori::all();
        $mostViewedNews = Berita::with('kategori', 'user')->orderByDesc('total_views')->take(5)->get();
        $footerMostViewedNews = Berita::orderByDesc('total_views')->take(3)->get();

        return view('frontend.content.aboutUs', compact('menu', 'kategoriAll', 'mostViewedNews', 'footerMostViewedNews'));
    }
}
