<?php

namespace App\Http\Livewire;

use App\Models\contact;
use App\Models\preview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeController extends Component
{
    public $name, $message;

    public function contact()
    {
        $contact = new contact();
        $contact->name = $this->name;
        $contact->message = $this->message;
        $contact->save();
        return redirect()->route('home')->with('message', 'Success Contact Us');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->utype === 'ADM') {
                return view('livewire.admin.admin-component');
            }
            elseif (Auth::user()->utype === 'TEA') {
                return view('livewire.teacher.teacher-component');
            }
            elseif (Auth::user()->utype === 'STD') {
                return view('livewire.student.student-component');
            }
            else {
                return view('livewire.layout-component');
            }
        }
        else
        {
            $review = preview::all();
            return view('livewire.home-controller',['review'=>$review]);
        }
    }
}
