<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\student;
use App\Models\SubKelas;
use App\Models\teacher;
use App\Models\User;
use Livewire\Component;

class AdminDeletedDataKelasComponent extends Component
{
    public function restore($id)
    {
        $kelas = Kelas::withTrashed()->where('id', $id)->restore();

        $subkelas1 = SubKelas::withTrashed()->where('kelas_id', $id)->get();

        $sentences = [];
        foreach ($subkelas1 as $index => $item) {
            if($item->count() === 1)
            {
                $sentences[] .= (int)$item['id'];
            }
            elseif($index == $item->count()-1)
            {
                $sentences[] .= (int)$item['id'];
            }
            else 
            {
                $sentences[] .= (int)$item['id'].',';
            }
        }

        $teacher1 = teacher::withTrashed()->whereIn('subkelas_id', $sentences)->get();
        $sentence = [];
        foreach ($teacher1 as $index => $item) {
            if($item->count() === 1)
            {
                $sentence[] .= (int)$item['user_id'];
            }
            elseif($index == $item->count()-1)
            {
                $sentence[] .= (int)$item['user_id'];
            }
            else 
            {
                $sentence[] .= (int)$item['user_id'].',';
            }
        }

        $student1 = student::withTrashed()->whereIn('subkelas_id', $sentences)->get();
        $sentencess = [];
        foreach ($student1 as $index => $item) {
            if($item->count() === 1)
            {
                $sentencess[] .= (int)$item['user_id'];
            }
            elseif($index == $item->count()-1)
            {
                $sentencess[] .= (int)$item['user_id'];
            }
            else 
            {
                $sentencess[] .= (int)$item['user_id'].',';
            }
        }

        $subkelas = SubKelas::withTrashed()->where('kelas_id', $id)->restore();
        $user = User::withTrashed()->whereIn('id', $sentence)->restore();
        $user1 = User::withTrashed()->whereIn('id', $sentencess)->restore();
        $teacher = teacher::withTrashed()->whereIn('subkelas_id', $sentences)->restore();
        $student = student::withTrashed()->whereIn('subkelas_id', $sentences)->restore();

        return redirect()->route('admin.kelas')->with('message', 'Berhasil Pulihkan Kelas');
    }

    public function forceDelete($id)
    {
        $kelas = Kelas::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.deleted.kelas')->with('message', 'Berhasil Hapus Permanen Kelas');
    }

    public function render()
    {
        $kelas = Kelas::onlyTrashed()->get();
        return view('livewire.admin.admin-deleted-data-kelas-component',['kelas'=>$kelas]);
    }
}
