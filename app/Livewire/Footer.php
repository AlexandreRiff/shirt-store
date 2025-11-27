<?php

namespace App\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public string $email = '';

    public function subscribe(): void
    {
        $this->email = '';
        session()->flash('subscribed', true);
    }

    public function render()
    {
        return view('livewire.footer');
    }
}
