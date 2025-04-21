<?php

namespace App\Livewire;

use Livewire\Component;

class DriverProfileTabs extends Component
{
    public $isVisible=1;

    public function toogle($isVisible){
        $this->isVisible=!$isVisible;
    }



    public function render()
    {
        return view('livewire.driver-profile-tabs');
    }
}
