<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected array $messages = [
        'email.required' => 'O e-mail é obrigatório.',
        'email.email' => 'Digite um e-mail válido.',
        'password.required' => 'A senha é obrigatória.',
        'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            return redirect()->intended('/');
        }

        $this->addError('email', 'Credenciais inválidas.');
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}
