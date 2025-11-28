<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('layouts.app')]
class AllProducts extends Component
{
    #[Url]
    public string $sortBy = 'featured';

    #[Url]
    public array $selectedCategories = [];

    #[Url]
    public array $selectedColors = [];

    #[Url]
    public int $minPrice = 0;

    #[Url]
    public int $maxPrice = 150;

    public array $availableColors = [
        'Branco' => '#FFFFFF',
        'Preto' => '#000000',
        'Cinza' => '#808080',
        'Cinza Escuro' => '#404040',
        'Cinza Mescla' => '#A0A0A0',
        'Azul Mescla' => '#6B8BA4',
        'Navy' => '#1a1a2e',
        'Vinho' => '#722F37',
        'Verde Oliva' => '#556B2F',
        'Mostarda' => '#FFDB58',
        'Areia' => '#C2B280',
        'Off White' => '#FAF9F6',
        'Burgundy' => '#800020',
        'Terracota' => '#E2725B',
        'Azul Claro' => '#ADD8E6',
        'Rosa Pastel' => '#FFD1DC',
    ];

    public function clearFilters(): void
    {
        $this->selectedCategories = [];
        $this->selectedColors = [];
        $this->minPrice = 0;
        $this->maxPrice = 150;
    }

    private function getMockedCategories(): array
    {
        return [
            ['id' => 1, 'name' => 'Masculino'],
            ['id' => 2, 'name' => 'Feminino'],
            ['id' => 3, 'name' => 'Infantil'],
        ];
    }

    private function getMockedProducts(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Camiseta Essential Branca',
                'slug' => 'camiseta-essential-branca',
                'category' => 'Masculino',
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=400&fit=crop',
                'price' => 79.90,
                'old_price' => null,
                'discount' => null,
                'rating' => 4.8,
                'reviews' => 127,
                'colors' => ['#FFFFFF', '#000000', '#808080'],
                'colorNames' => ['Branco', 'Preto', 'Cinza'],
            ],
            [
                'id' => 2,
                'name' => 'Camiseta Oversized Preta',
                'slug' => 'camiseta-oversized-preta',
                'category' => 'Masculino',
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=400&h=400&fit=crop',
                'price' => 99.90,
                'old_price' => 129.90,
                'discount' => 23,
                'rating' => 4.9,
                'reviews' => 89,
                'colors' => ['#000000', '#A0A0A0', '#FAF9F6'],
                'colorNames' => ['Preto', 'Cinza Mescla', 'Off White'],
            ],
            [
                'id' => 3,
                'name' => 'Camiseta Básica Cinza Mescla',
                'slug' => 'camiseta-basica-cinza-mescla',
                'category' => 'Masculino',
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=400&h=400&fit=crop',
                'price' => 69.90,
                'old_price' => null,
                'discount' => null,
                'rating' => 4.7,
                'reviews' => 156,
                'colors' => ['#A0A0A0', '#6B8BA4'],
                'colorNames' => ['Cinza Mescla', 'Azul Mescla'],
            ],
            [
                'id' => 4,
                'name' => 'Camiseta Navy Premium',
                'slug' => 'camiseta-navy-premium',
                'category' => 'Masculino',
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1562157873-818bc0726f68?w=400&h=400&fit=crop',
                'price' => 89.90,
                'old_price' => null,
                'discount' => null,
                'rating' => 4.6,
                'reviews' => 78,
                'colors' => ['#1a1a2e', '#722F37'],
                'colorNames' => ['Navy', 'Vinho'],
            ],
            [
                'id' => 5,
                'name' => 'Camiseta Olive Green',
                'slug' => 'camiseta-olive-green',
                'category' => 'Masculino',
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=400&h=400&fit=crop',
                'price' => 84.90,
                'old_price' => null,
                'discount' => null,
                'rating' => 4.8,
                'reviews' => 94,
                'colors' => ['#556B2F', '#FFDB58'],
                'colorNames' => ['Verde Oliva', 'Mostarda'],
            ],
            [
                'id' => 6,
                'name' => 'Camiseta Sand Bege',
                'slug' => 'camiseta-sand-bege',
                'category' => 'Feminino',
                'category_id' => 2,
                'image' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=400&h=400&fit=crop',
                'price' => 79.90,
                'old_price' => null,
                'discount' => null,
                'rating' => 4.9,
                'reviews' => 112,
                'colors' => ['#C2B280', '#FAF9F6'],
                'colorNames' => ['Areia', 'Off White'],
            ],
            [
                'id' => 7,
                'name' => 'Camiseta Burgundy',
                'slug' => 'camiseta-burgundy',
                'category' => 'Feminino',
                'category_id' => 2,
                'image' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=400&h=400&fit=crop',
                'price' => 94.90,
                'old_price' => 119.90,
                'discount' => 21,
                'rating' => 4.7,
                'reviews' => 67,
                'colors' => ['#800020', '#E2725B'],
                'colorNames' => ['Burgundy', 'Terracota'],
            ],
            [
                'id' => 8,
                'name' => 'Camiseta Sky Blue',
                'slug' => 'camiseta-sky-blue',
                'category' => 'Feminino',
                'category_id' => 2,
                'image' => 'https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?w=400&h=400&fit=crop',
                'price' => 74.90,
                'old_price' => null,
                'discount' => null,
                'rating' => 4.8,
                'reviews' => 143,
                'colors' => ['#ADD8E6', '#FFD1DC'],
                'colorNames' => ['Azul Claro', 'Rosa Pastel'],
            ],
        ];
    }

    public function render()
    {
        $categories = $this->getMockedCategories();
        $allProducts = collect($this->getMockedProducts());

        // Filter by categories
        if (! empty($this->selectedCategories)) {
            $allProducts = $allProducts->filter(fn ($p) => in_array($p['category_id'], $this->selectedCategories));
        }

        // Filter by price range
        $allProducts = $allProducts->filter(fn ($p) => $p['price'] >= $this->minPrice && $p['price'] <= $this->maxPrice);

        // Filter by colors
        if (! empty($this->selectedColors)) {
            $allProducts = $allProducts->filter(function ($p) {
                return ! empty(array_intersect($p['colorNames'], $this->selectedColors));
            });
        }

        // Sorting
        $allProducts = match ($this->sortBy) {
            'price_asc' => $allProducts->sortBy('price'),
            'price_desc' => $allProducts->sortByDesc('price'),
            'newest' => $allProducts->sortByDesc('id'),
            default => $allProducts,
        };

        return view('livewire.all-products', [
            'categories' => $categories,
            'productsData' => $allProducts->values(),
            'totalProducts' => $allProducts->count(),
        ]);
    }
}
