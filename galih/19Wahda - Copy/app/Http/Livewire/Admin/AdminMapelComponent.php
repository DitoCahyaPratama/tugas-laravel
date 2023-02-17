<?php

namespace App\Http\Livewire\Admin;

use App\Models\mapel;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMapelComponent extends Component
{
    use WithPagination;
    
    public function delete($id)
    {
        $materi = mapel::findOrFail($id);
        $materi->delete();
        session()->flash('message', 'Berhasil Menghapus Mata Pelajaran');
    }

    public function render()
    {
        $mapel = mapel::orderBy('name', 'ASC')->paginate(3);
        return view('livewire.admin.admin-mapel-component',['mapel'=>$mapel]);
    }
}
