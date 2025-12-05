<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Profile extends Component
{
    public string $name = 'Administrador';

    public string $email = 'admin@urbanthreads.com';

    public string $phone = '(11) 99999-9999';

    public string $currentPassword = '';

    public string $newPassword = '';

    public string $confirmPassword = '';

    public bool $showCurrentPassword = false;

    public bool $showNewPassword = false;

    public bool $showConfirmPassword = false;

    public function saveProfile()
    {
        $this->dispatch('toast', message: 'Perfil atualizado com sucesso!', type: 'success');
    }

    public function changePassword()
    {
        if ($this->newPassword !== $this->confirmPassword) {
            $this->dispatch('toast', message: 'As senhas não coincidem!', type: 'error');

            return;
        }

        $this->reset(['currentPassword', 'newPassword', 'confirmPassword']);
        $this->dispatch('toast', message: 'Senha alterada com sucesso!', type: 'success');
    }

    public function render()
    {
        return view('livewire.admin.profile')->layout('layouts.admin');
    }
}
