<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public array $menuItems = [
        ['label' => 'Todos os Produtos', 'url' => '/produtos'],
        ['label' => 'Masculino', 'url' => '/produtos?selectedCategories[]=1'],
        ['label' => 'Feminino', 'url' => '/produtos?selectedCategories[]=2'],
        ['label' => 'Infantil', 'url' => '/produtos?selectedCategories[]=3'],
    ];

    public function render()
    {
        return view('livewire.header');
    }
}
