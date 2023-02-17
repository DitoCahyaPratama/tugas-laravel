<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\student;
use App\Models\SubKelas;
use App\Models\teacher;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminKelasComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $materi = Kelas::findOrFail($id);

        $subkelas1 = SubKelas::where('kelas_id', $id)->get();

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

        $teacher1 = teacher::whereIn('subkelas_id', $sentences)->get();
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

        $student1 = student::whereIn('subkelas_id', $sentences)->get();
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

        $materi->delete();
        $subkelas = SubKelas::where('kelas_id', $id)->delete();
        $user = User::whereIn('id', $sentence)->delete();
        $user = User::whereIn('id', $sentencess)->delete();
        $teacher = teacher::whereIn('subkelas_id', $sentences)->delete();
        $student = student::whereIn('subkelas_id', $sentences)->delete();
        session()->flash('message', 'Berhasil Menghapus Materi');
    }

    public function render()
    {
        $kelas = Kelas::orderBy('name', 'ASC')->paginate(3);
        return view('livewire.admin.admin-kelas-component',['kelas'=>$kelas]);
    }
}
