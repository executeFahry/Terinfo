<?php

namespace App\Http\Livewire;

use App\Models\Berita;
use Livewire\Component;

class BeritaLoader extends Component
{
    public $count = 6;
    public $totalBerita;

    public function mount()
    {
        $this->totalBerita = Berita::count();
    }

    public function render()
    {
        $berita = Berita::with(['kategori', 'user'])
            ->withCount('komentar')
            ->latest()
            ->take($this->count)
            ->get();

        return view('livewire.berita-loader', compact('berita'));
    }

    public function loadMore()
    {
        $this->count += 4;
    }
}
