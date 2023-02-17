<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\jawabanTugas;
use App\Models\student;
use App\Models\tugas;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherTugasDoneComponent extends Controller
{
    public function index(Request $request, $tugas_id)
    {
        // $data = student::all();

        // return response()->json(
        //     [
        //         'data' => $data,
        //     ],
        //     200
        // );

        $data1 = jawabanTugas::where('tugas_id',$tugas_id)->get();
        $sentence = [];
        foreach ($data1 as $index => $item) {
            if($item->count() === 1)
            {
                $sentence[] .= (int)$item['student_id'];
            }
            elseif($index == $item->count()-1)
            {
                $sentence[] .= (int)$item['student_id'];
            }
            else 
            {
                $sentence[] .= (int)$item['student_id'].',';
            }
        }

        $data2 = student::whereIn('id', $sentence)->get();
        $sentences = [];
        foreach ($data2 as $index => $item) {
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

        $data = User::whereIn('id', $sentences)->get();

        if($data){
            return response()->json($data);
        }else{
            return response()->json(['message'=>'data tidak ditemukan'],404);
        }
    }
}
