<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductDetail extends Component
{
    public array $product = [];

    public array $relatedProducts = [];

    public string $selectedColor = '';

    public string $selectedSize = '';

    public int $quantity = 1;

    public string $activeTab = 'description';

    public function mount(string $slug = 'camiseta-oversized-preta'): void
    {
        $description = 'Modelo oversized contemporâneo. Tecido premium com toque macio e durabilidade excepcional.';
        $fullDescription = 'Confeccionada com materiais de alta qualidade, esta camiseta oferece conforto excepcional e durabilidade para o uso diário. O design atemporal permite combinações versáteis com diferentes estilos, tornando-a uma peça essencial no seu guarda-roupa.';

        $products = [
            'camiseta-essential-branca' => [
                'id' => 1,
                'slug' => 'camiseta-essential-branca',
                'name' => 'Camiseta Essential Branca',
                'category' => 'Masculino',
                'price' => 79.90,
                'old_price' => null,
                'rating' => 4.8,
                'reviews' => 127,
                'images' => [
                    'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600&h=700&fit=crop',
                    'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600&h=700&fit=crop&sat=-100',
                ],
                'colors' => [
                    ['name' => 'Branco', 'hex' => '#FFFFFF', 'available' => true],
                    ['name' => 'Preto', 'hex' => '#1a1a1a', 'available' => true],
                    ['name' => 'Cinza', 'hex' => '#4a5568', 'available' => false],
                ],
                'sizes' => [
                    ['name' => 'M', 'available' => true],
                    ['name' => 'G', 'available' => true],
                    ['name' => 'GG', 'available' => false],
                    ['name' => 'XG', 'available' => true],
                ],
                'description' => $description,
                'full_description' => $fullDescription,
            ],
            'camiseta-oversized-preta' => [
                'id' => 2,
                'slug' => 'camiseta-oversized-preta',
                'name' => 'Camiseta Oversized Preta',
                'category' => 'Masculino',
                'price' => 99.90,
                'old_price' => 129.90,
                'rating' => 4.9,
                'reviews' => 89,
                'images' => [
                    'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=600&h=700&fit=crop',
                    'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=600&h=700&fit=crop&sat=-100',
                ],
                'colors' => [
                    ['name' => 'Preto', 'hex' => '#1a1a1a', 'available' => true],
                    ['name' => 'Branco', 'hex' => '#FFFFFF', 'available' => true],
                    ['name' => 'Cinza', 'hex' => '#4a5568', 'available' => true],
                ],
                'sizes' => [
                    ['name' => 'M', 'available' => true],
                    ['name' => 'G', 'available' => true],
                    ['name' => 'GG', 'available' => true],
                    ['name' => 'XG', 'available' => false],
                ],
                'description' => $description,
                'full_description' => $fullDescription,
            ],
            'camiseta-navy-premium' => [
                'id' => 3,
                'slug' => 'camiseta-navy-premium',
                'name' => 'Camiseta Navy Premium',
                'category' => 'Feminino',
                'price' => 89.90,
                'old_price' => null,
                'rating' => 4.6,
                'reviews' => 78,
                'images' => [
                    'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=600&h=700&fit=crop',
                ],
                'colors' => [
                    ['name' => 'Azul', 'hex' => '#1e3a5f', 'available' => true],
                    ['name' => 'Vermelho', 'hex' => '#dc2626', 'available' => false],
                ],
                'sizes' => [
                    ['name' => 'M', 'available' => true],
                    ['name' => 'G', 'available' => true],
                    ['name' => 'GG', 'available' => true],
                    ['name' => 'XG', 'available' => true],
                ],
                'description' => $description,
                'full_description' => $fullDescription,
            ],
            'camiseta-basica-cinza-mescla' => [
                'id' => 4,
                'slug' => 'camiseta-basica-cinza-mescla',
                'name' => 'Camiseta Básica Cinza Mescla',
                'category' => 'Masculino',
                'price' => 69.90,
                'old_price' => null,
                'rating' => 4.7,
                'reviews' => 156,
                'images' => [
                    'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=700&fit=crop',
                ],
                'colors' => [
                    ['name' => 'Cinza', 'hex' => '#6b7280', 'available' => true],
                    ['name' => 'Azul', 'hex' => '#3b82f6', 'available' => true],
                ],
                'sizes' => [
                    ['name' => 'M', 'available' => false],
                    ['name' => 'G', 'available' => true],
                    ['name' => 'GG', 'available' => true],
                    ['name' => 'XG', 'available' => true],
                ],
                'description' => $description,
                'full_description' => $fullDescription,
            ],
            'camiseta-olive-green' => [
                'id' => 5,
                'slug' => 'camiseta-olive-green',
                'name' => 'Camiseta Olive Green',
                'category' => 'Infantil',
                'price' => 84.90,
                'old_price' => null,
                'rating' => 4.8,
                'reviews' => 94,
                'images' => [
                    'https://images.unsplash.com/photo-1562157873-818bc0726f68?w=600&h=700&fit=crop',
                ],
                'colors' => [
                    ['name' => 'Verde', 'hex' => '#84cc16', 'available' => true],
                    ['name' => 'Amarelo', 'hex' => '#facc15', 'available' => true],
                ],
                'sizes' => [
                    ['name' => 'M', 'available' => true],
                    ['name' => 'G', 'available' => true],
                    ['name' => 'GG', 'available' => true],
                    ['name' => 'XG', 'available' => true],
                ],
                'description' => $description,
                'full_description' => $fullDescription,
            ],
            'camiseta-sand-bege' => [
                'id' => 6,
                'slug' => 'camiseta-sand-bege',
                'name' => 'Camiseta Sand Bege',
                'category' => 'Feminino',
                'price' => 79.90,
                'old_price' => null,
                'rating' => 4.9,
                'reviews' => 112,
                'images' => [
                    'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=700&fit=crop',
                ],
                'colors' => [
                    ['name' => 'Bege', 'hex' => '#d4a574', 'available' => true],
                    ['name' => 'Areia', 'hex' => '#f5deb3', 'available' => true],
                ],
                'sizes' => [
                    ['name' => 'M', 'available' => true],
                    ['name' => 'G', 'available' => true],
                    ['name' => 'GG', 'available' => true],
                    ['name' => 'XG', 'available' => true],
                ],
                'description' => $description,
                'full_description' => $fullDescription,
            ],
        ];

        $this->product = $products[$slug] ?? $products['camiseta-oversized-preta'];
        $this->selectedColor = $this->product['colors'][0]['hex'] ?? '';

        // Related products (excluding current)
        $this->relatedProducts = array_values(array_filter($products, fn ($p) => $p['slug'] !== $slug));
        $this->relatedProducts = array_slice($this->relatedProducts, 0, 4);
    }

    public function selectColor(string $color): void
    {
        $this->selectedColor = $color;
    }

    public function selectSize(string $size): void
    {
        $this->selectedSize = $size;
    }

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    public function incrementQuantity(): void
    {
        $this->quantity++;
    }

    public function decrementQuantity(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
