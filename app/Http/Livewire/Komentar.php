<?php


namespace App\Http\Livewire;

use App\Models\Berita;
use Livewire\Component;
use App\Models\Komentar as ModelsKomentar;
use Illuminate\Support\Facades\Auth;

class Komentar extends Component
{
    public $berita, $isi, $isi2;
    public $comment_id, $edit_comment_id;

    protected $listeners = ['komentarAdded' => 'render'];

    public function mount($id_berita)
    {
        $this->berita = Berita::findOrFail($id_berita);
    }

    public function render()
    {
        $komentar = ModelsKomentar::with(['user', 'childrenComments'])
            ->where('id_berita', $this->berita->id_berita)
            ->whereNull('comment_id')
            ->get();

        $total_komentar = ModelsKomentar::where('id_berita', $this->berita->id_berita)->count();

        return view('livewire.komentar', compact('komentar', 'total_komentar'));
    }

    public function tambahKomentar()
    {
        $this->validate([
            'isi' => 'required',
        ]);

        $komentar = ModelsKomentar::create([
            'id_user' => Auth::user()->id_user,
            'id_berita' => $this->berita->id_berita,
            'isi' => $this->isi,
        ]);

        if ($komentar) {
            $this->emit('komentarAdded', $komentar->id_komentar);
            $this->isi = null;
        } else {
            session()->flash('error', 'Komentar gagal dikirim');
            return redirect()->route('home.detailBerita', $this->berita->slug);
        }
    }

    public function selectEdit($id_komentar)
    {
        $komentar = ModelsKomentar::findOrFail($id_komentar);
        $this->edit_comment_id = $komentar->id_komentar;
        $this->isi2 = $komentar->isi;
        $this->comment_id = null;
    }

    public function editKomentar()
    {
        $this->validate([
            'isi2' => 'required',
        ]);

        $komentar = ModelsKomentar::where('id_komentar', $this->edit_comment_id)->update([
            'isi' => $this->isi2,
        ]);

        if ($komentar) {
            $this->emit('komentarAdded', $this->edit_comment_id);
            $this->isi2 = null;
            $this->edit_comment_id = null;
        } else {
            session()->flash('danger', 'Komentar gagal diubah');
            return redirect()->route('home.detailBerita', $this->berita->slug);
        }
    }

    public function hapusKomentar($id_komentar)
    {
        // Temukan komentar yang akan dihapus
        $komentar = ModelsKomentar::findOrFail($id_komentar);

        // Hapus semua balasan dari komentar ini
        $this->hapusBalasan($komentar);

        // Hapus komentar utama
        $komentar->delete();
    }

    private function hapusBalasan($komentar)
    {
        // Dapatkan semua balasan dari komentar
        $balasan = $komentar->childrenComments;

        // Hapus setiap balasan
        foreach ($balasan as $balas) {
            $this->hapusBalasan($balas); // Hapus balasan dari balasan secara rekursif
            $balas->delete();
        }
    }

    public function selectReply($id_komentar)
    {
        $this->comment_id = $id_komentar;
        $this->edit_comment_id = null;
        $this->isi2 = null;
    }

    public function balasKomentar()
    {
        $this->validate([
            'isi2' => 'required',
        ]);

        $komentar = ModelsKomentar::create([
            'id_user' => Auth::user()->id_user,
            'id_berita' => $this->berita->id_berita,
            'isi' => $this->isi2,
            'comment_id' => $this->comment_id
        ]);

        if ($komentar) {
            $this->emit('komentarAdded', $komentar->id_komentar);
            $this->isi2 = null; // Reset isi2 setelah berhasil
            $this->comment_id = null; // Reset comment_id setelah berhasil
        } else {
            session()->flash('error', 'Komentar gagal dikirim');
            return redirect()->route('home.detailBerita', $this->berita->slug);
        }
    }
}
