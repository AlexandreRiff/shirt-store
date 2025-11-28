<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public array $cartItems = [];

    public function mount(): void
    {
        $this->cartItems = session()->get('cart', []);
    }

    public function removeItem(int $index): void
    {
        unset($this->cartItems[$index]);
        $this->cartItems = array_values($this->cartItems);
        session()->put('cart', $this->cartItems);
    }

    public function updateQuantity(int $index, int $quantity): void
    {
        if ($quantity > 0 && isset($this->cartItems[$index])) {
            $this->cartItems[$index]['quantity'] = $quantity;
            session()->put('cart', $this->cartItems);
        } elseif ($quantity <= 0) {
            $this->removeItem($index);
        }
    }

    public function getSubtotalProperty(): float
    {
        return collect($this->cartItems)->sum(fn ($item) => $item['price'] * $item['quantity']);
    }

    public function getTotalItemsProperty(): int
    {
        return collect($this->cartItems)->sum('quantity');
    }

    #[\Livewire\Attributes\Layout('layouts.app')]
    public function render()
    {
        return view('livewire.cart');
    }
}
