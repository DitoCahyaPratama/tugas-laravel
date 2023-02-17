<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\student;
use App\Models\SubKelas;
use App\Models\teacher;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSubKelasComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $materi = SubKelas::findOrFail($id);
      
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
        $materi->delete();
        $user = User::whereIn('id', $sentence)->delete();
        $user = User::whereIn('id', $sentences)->delete();
        $teacher = teacher::where('subkelas_id', $id)->delete();
        $student = student::where('subkelas_id', $id)->delete();
        session()->flash('message', 'Berhasil Menghapus Materi');
    }

    public function render()
    {
        $subkelas = SubKelas::whereHas('kelas', function ($query){
            $query->whereNull('deleted_at');
        })->whereNotNull('kelas_id')->orderBy('name', 'ASC')->paginate(3);
        return view('livewire.admin.admin-sub-kelas-component',['subkelas'=>$subkelas]);
    }
}
