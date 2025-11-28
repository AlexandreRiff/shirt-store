<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public array $menuItems = [
        ['label' => 'Todos os Produtos', 'url' => '/produtos'],
        ['label' => 'Masculino', 'url' => '/produtos?selectedCategories[]=1'],
        ['label' => 'Feminino', 'url' => '/produtos?selectedCategories[]=2'],
        ['label' => 'Infantil', 'url' => '/produtos?selectedCategories[]=3'],
    ];

    public function getCartCountProperty(): int
    {
        $cart = session()->get('cart', []);

        return collect($cart)->sum('quantity');
    }

    #[On('cart-updated')]
    public function refreshCart(): void
    {
        // Força re-render do componente
    }

    public function render()
    {
        return view('livewire.header');
    }
}
