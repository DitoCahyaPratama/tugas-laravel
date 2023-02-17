<?php

namespace App\Http\Livewire\Admin;

use App\Models\student;
use App\Models\SubKelas;
use App\Models\teacher;
use App\Models\User;
use Livewire\Component;

class AdminDeletedDataSubKelasComponent extends Component
{
    public function restore($id)
    {
        $subkelas = SubKelas::withTrashed()->where('id', $id)->restore();
        $student = student::withTrashed()->where('subkelas_id', $id)->restore();
        $teacher = teacher::withTrashed()->where('subkelas_id', $id)->restore();

        $teacher1 = teacher::where('subkelas_id', $id)->get();
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

        $student1 = student::where('subkelas_id', $id)->get();
        $sentences = [];
        foreach ($student1 as $index => $item) {
            if($item->count() === 1)
            {
                $sentences[] .= (int)$item['user_id'];
            }
            elseif($index == $item->count()-1)
            {
                $sentences[] .= (int)$item['user_id'];
            }
            else 
            {
                $sentences[] .= (int)$item['user_id'].',';
            }
        }

        $user = User::withTrashed()->whereIn('id', $sentence)->restore();
        $user = User::withTrashed()->whereIn('id', $sentences)->restore();

        return redirect()->route('admin.subkelas')->with('message', 'Berhasil Pulihkan Sub Kelas');
    }

    public function forceDelete($id)
    {
        $subkelas = SubKelas::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.deleted.subkelas')->with('message', 'Berhasil Hapus Permanen Sub Kelas');
    }

    public function render()
    {
        $subkelas = SubKelas::onlyTrashed()->get();
        return view('livewire.admin.admin-deleted-data-sub-kelas-component',['subkelas'=>$subkelas]);
    }
}
