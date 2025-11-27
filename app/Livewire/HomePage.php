<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class HomePage extends Component
{
    public array $products = [];

    public array $testimonials = [];

    public array $features = [];

    public function mount(): void
    {
        $this->products = [
            [
                'id' => 1,
                'slug' => 'camiseta-essential-branca',
                'name' => 'Camiseta Essential Branca',
                'category' => 'Masculino',
                'price' => 79.90,
                'old_price' => null,
                'rating' => 4.8,
                'reviews' => 127,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=500&fit=crop',
                'colors' => ['#FFFFFF', '#1a1a1a', '#4a5568'],
                'discount' => null,
            ],
            [
                'id' => 2,
                'slug' => 'camiseta-oversized-preta',
                'name' => 'Camiseta Oversized Preta',
                'category' => 'Masculino',
                'price' => 99.90,
                'old_price' => 129.90,
                'rating' => 4.9,
                'reviews' => 89,
                'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=400&h=500&fit=crop',
                'colors' => ['#1a1a1a', '#FFFFFF', '#4a5568'],
                'discount' => 23,
            ],
            [
                'id' => 3,
                'slug' => 'camiseta-navy-premium',
                'name' => 'Camiseta Navy Premium',
                'category' => 'Masculino',
                'price' => 89.90,
                'old_price' => null,
                'rating' => 4.6,
                'reviews' => 78,
                'image' => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=400&h=500&fit=crop',
                'colors' => ['#1e3a5f', '#dc2626'],
                'discount' => null,
            ],
            [
                'id' => 4,
                'slug' => 'camiseta-sand-bege',
                'name' => 'Camiseta Sand Bege',
                'category' => 'Feminino',
                'price' => 79.90,
                'old_price' => null,
                'rating' => 4.9,
                'reviews' => 112,
                'image' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=400&h=500&fit=crop',
                'colors' => ['#d4a574', '#f5deb3'],
                'discount' => null,
            ],
        ];

        $this->testimonials = [
            [
                'name' => 'Carlos Silva',
                'rating' => 5,
                'text' => 'Qualidade excepcional! As camisetas são super confortáveis e o tecido é premium mesmo.',
            ],
            [
                'name' => 'Ana Santos',
                'rating' => 5,
                'text' => 'Adorei o caimento! Comprei 3 cores diferentes e todas ficaram perfeitas.',
            ],
            [
                'name' => 'Pedro Costa',
                'rating' => 5,
                'text' => 'Entrega rápida e produto exatamente como descrito. Virei cliente fiel!',
            ],
        ];

        $this->features = [
            ['icon' => 'truck', 'title' => 'Entrega Rápida', 'description' => 'Frete grátis acima de R$ 200'],
            ['icon' => 'shield', 'title' => 'Compra Segura', 'description' => '100% seguro e protegido'],
            ['icon' => 'refresh', 'title' => 'Troca Fácil', 'description' => '30 dias para trocas'],
            ['icon' => 'star', 'title' => 'Qualidade Premium', 'description' => 'Tecidos de alta qualidade'],
        ];
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
