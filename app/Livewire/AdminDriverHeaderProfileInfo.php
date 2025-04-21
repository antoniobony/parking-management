<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class AdminDriverHeaderProfileInfo extends Component
{
    public $location,$rule,$mode,$place,$type,$price_minute,$parking_id;
    public $m=null;
    public $querystring=['m'];


    public function selectMode($m){
        $this->m=$m;
    }

    public function mount(){
        if(Auth::guard('admin')->check()){
            $park=\App\Models\parking::where('admin_id',"=",auth()->id())->get();
            foreach($park as $parking ){
            $this->location=$parking->location;
            $this->rule=$parking->rule;
            $this->mode=$parking->mode;
            $this->place=$parking->place;
            $this->type=$parking->type;
            $this->price_minute=$parking->price_minute;
            $this->parking_id=$parking->id;
        }
        }
    }

    public function render()
    {
        return view('livewire.admin-driver-header-profile-info');
    }
}
