<?php

namespace App\Http\Livewire\Layouts;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LayoutsProfileComponent extends Component
{
    public function render()
    {
        $user = User::find(Auth::user()->id);
        return view('livewire.layouts.layouts-profile-component', ['user'=>$user]);
    }
}
