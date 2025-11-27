<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public array $menuItems = [
        'Todos os Produtos',
        'Masculino',
        'Feminino',
        'Infantil',
    ];

    public function render()
    {
        return view('livewire.header');
    }
}
