<?php

namespace App\Http\Livewire\Admin;

use App\Models\mapel;
use Livewire\Component;

class AdminDeletedDataMapelComponent extends Component
{
    public function restore($id)
    {
        $kelas = mapel::withTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.mapel')->with('message', 'Berhasil Pulihkan Mata Pelajaran');
    }

    public function forceDelete($id)
    {
        $kelas = mapel::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.deleted.mapel')->with('message', 'Berhasil Hapus Permanen Mata Pelajaran');
    }

    public function render()
    {
        $kelas = mapel::onlyTrashed()->get();
        return view('livewire.admin.admin-deleted-data-mapel-component',['kelas'=>$kelas]);
    }
}
