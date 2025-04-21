<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDriverProfileTabs extends Component
{
    public $tab = null;
    public $tabname = 'Overview';
    protected $queryString = ['tab'];
    public $username, $email, $id;
    public $password, $newpassword, $renewpassword;

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function UpdatePassword()
    {
        $this->validate([
            'password' => [
                'required', function($attribute, $value, $fail) {
                    $model = Auth::guard('admin')->check()
                        ? \App\Models\admin::find(auth('admin')->id())->password
                        : \App\Models\driver::find(auth('driver')->id())->password;

                    if (!Hash::check($value, $model)) {
                        return $fail(__('The current password is incorrect'));
                    }
                }
            ],
            'newpassword' => 'required|min:6|max:45',
            'renewpassword' => 'bail|required|same:newpassword'
        ]);
        $query = Auth::guard('admin')->check()
            ? \App\Models\admin::findOrFail(auth('admin')->id())->update([
                'password' => Hash::make($this->renewpassword)
            ])
            : \App\Models\driver::findOrFail(auth('driver')->id())->update([
                'password' => Hash::make($this->renewpassword)
            ]);

        if ($query) {
            $this->password = $this->newpassword = $this->renewpassword = null;
            session()->flash('success', 'Votre mot de passe a été changé');
        } else {
            session()->flash('fails', "Une erreur s'est produite");
        }
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->tabname;

        if (Auth::guard('admin')->check()) {
            $admin = \App\Models\Admin::findOrFail(auth('admin')->id());
            $this->id = $admin->id;
            $this->username = $admin->username;
            $this->email = $admin->email;
        } elseif (Auth::guard('driver')->check()) {
            $driver = \App\Models\Driver::findOrFail(auth('driver')->id());
            $this->id = $driver->id;
            $this->username = $driver->username;
            $this->email = $driver->email;
        }
    }

    public function render()
    {
        return view('livewire.admin-driver-profile-tabs');
    }
}
