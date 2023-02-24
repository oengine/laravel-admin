<?php

namespace OEngine\Admin\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use OEngine\Reojs\Livewire\Component;

class ForgotPassword extends Component
{
    public $username;
    public $password;
    public $isRememberMe;

    protected $rules = [
        'password' => 'required|min:1',
        'username' => 'required|min:1',
    ];
    public function DoWork()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->username, 'password' => $this->password], $this->isRememberMe)) {
            return redirect('/');
        } else {
            $this->showMessage("Login Fail");
        }
    }
    public function mount()
    {
      
    }
    public function render()
    {
        
        return viewt('admin::auth.forgot-password');
    }
}
