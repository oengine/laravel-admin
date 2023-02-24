<?php

namespace OEngine\Admin\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use OEngine\Reojs\Livewire\Component;

class Signup extends Component
{
    public $email;
    public $name;
    public $password;
    public $agree;
    protected $rules = [
        'password' => 'required|min:6',
        'name' => 'required|min:6',
        'email' => 'required|min:6',
        'agree'=> 'required',
    ];
    public function DoWork()
    {
        $this->validate();
        $user = new (config('platform.model.user'));
        $user->email = $this->email;
        $user->name = $this->name;
        $user->password = $this->password;
        $user->save();
        return redirect(route('auth.login'));
    }
    public function mount()
    {
    }
    public function render()
    {

        return viewt('admin::auth.sign-up');
    }
}
