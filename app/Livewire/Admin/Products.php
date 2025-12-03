<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class Products extends Component
{
    use WithFileUploads;

    public string $search = '';

    public bool $showModal = false;

    public bool $showDeleteModal = false;

    public ?int $editingProductId = null;

    public ?int $deletingProductId = null;

    // Form fields - Informações Básicas
    public string $name = '';

    public string $shortDescription = '';

    public string $fullDescription = '';

    public string $category = 'Masculino';

    public string $price = '';

    public string $oldPrice = '';

    // Especificações
    public string $material = '';

    public string $modelagem = '';

    public string $gramatura = '';

    public string $fabricadoEm = 'Brasil';

    // Cuidados
    public string $careInstructions = '';

    // Imagens
    public $uploadedImages = [];

    public array $existingImages = [];

    public int $primaryImageIndex = 0;

    // Variantes (tamanho + cores)
    public array $variants = [];

    public array $availableSizes = ['PP', 'P', 'M', 'G', 'GG', 'XG'];

    public array $availableColors = [
        'Branco' => '#FFFFFF',
        'Preto' => '#1a1a1a',
        'Cinza' => '#4a5568',
        'Azul' => '#3B82F6',
        'Azul Marinho' => '#1e3a5f',
        'Verde' => '#22C55E',
        'Vermelho' => '#dc2626',
        'Rosa' => '#EC4899',
        'Amarelo' => '#facc15',
        'Laranja' => '#F97316',
        'Bege' => '#d4a574',
    ];

    public array $availableCategories = ['Masculino', 'Feminino', 'Infantil'];

    public function getProductsProperty(): array
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Camiseta Essential Branca',
                'description' => 'Camiseta básica premium em algodão 100% puro. Corte moderno e caimento perfeito para o dia a dia.',
                'category' => 'Masculino',
                'price' => 79.90,
                'oldPrice' => null,
                'colors' => ['#FFFFFF', '#000000', '#6B7280'],
                'stock' => 25,
                'rating' => 4.8,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=200&h=200&fit=crop',
            ],
            [
                'id' => 2,
                'name' => 'Camiseta Oversized Preta',
                'description' => 'Modelo oversized contemporâneo. Tecido premium com toque macio e durabilidade excepcional.',
                'category' => 'Masculino',
                'price' => 99.90,
                'oldPrice' => 129.90,
                'colors' => ['#000000', '#FFFFFF', '#1F2937'],
                'stock' => 18,
                'rating' => 4.9,
                'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=200&h=200&fit=crop',
            ],
            [
                'id' => 3,
                'name' => 'Camiseta Básica Cinza Mescla',
                'description' => 'Camiseta versátil em cinza mescla. Ideal para compor looks casuais e confortáveis.',
                'category' => 'Masculino',
                'price' => 69.90,
                'oldPrice' => null,
                'colors' => ['#9CA3AF', '#3B82F6'],
                'stock' => 32,
                'rating' => 4.7,
                'image' => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=200&h=200&fit=crop',
            ],
            [
                'id' => 4,
                'name' => 'Camiseta Navy Premium',
                'description' => 'Azul marinho elegante. Tecido de alta qualidade com acabamento impecável.',
                'category' => 'Feminino',
                'price' => 89.90,
                'oldPrice' => null,
                'colors' => ['#1E3A5F', '#000000'],
                'stock' => 15,
                'rating' => 4.6,
                'image' => 'https://images.unsplash.com/photo-1562157873-818bc0726f68?w=200&h=200&fit=crop',
            ],
            [
                'id' => 5,
                'name' => 'Camiseta Slim Fit Verde',
                'description' => 'Corte slim moderno em verde militar. Perfeita para um visual urbano e estiloso.',
                'category' => 'Masculino',
                'price' => 84.90,
                'oldPrice' => null,
                'colors' => ['#4B5320', '#000000', '#FFFFFF'],
                'stock' => 0,
                'rating' => 4.5,
                'image' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=200&h=200&fit=crop',
            ],
            [
                'id' => 6,
                'name' => 'Camiseta Feminina Rosa',
                'description' => 'Camiseta feminina em rosa suave. Tecido leve e confortável para o dia a dia.',
                'category' => 'Feminino',
                'price' => 74.90,
                'oldPrice' => null,
                'colors' => ['#FFC0CB', '#FFFFFF', '#000000'],
                'stock' => 22,
                'rating' => 4.8,
                'image' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=200&h=200&fit=crop',
            ],
        ];

        if ($this->search) {
            $search = strtolower($this->search);
            $products = array_filter($products, fn ($p) => str_contains(strtolower($p['name']), $search) ||
                str_contains(strtolower($p['description']), $search) ||
                str_contains(strtolower($p['category']), $search)
            );
        }

        return array_values($products);
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEditModal(int $productId)
    {
        $product = collect($this->products)->firstWhere('id', $productId);
        if ($product) {
            $this->editingProductId = $product['id'];
            $this->name = $product['name'];
            $this->shortDescription = $product['description'];
            $this->category = $product['category'];
            $this->price = (string) $product['price'];
            $this->oldPrice = $product['oldPrice'] ? (string) $product['oldPrice'] : '';
            $this->existingImages = [
                ['url' => $product['image'], 'isPrimary' => true],
            ];
            $this->primaryImageIndex = 0;
            $this->fullDescription = 'Confeccionada com materiais de alta qualidade, esta camiseta oferece conforto excepcional e durabilidade para o uso diário.';
            $this->material = '95% Algodão, 5% Elastano';
            $this->modelagem = 'Regular Fit';
            $this->gramatura = '180g/m²';
            $this->careInstructions = 'Lavar à máquina com água fria (máx. 30°C). Não usar alvejante. Secar à sombra.';
            $this->variants = [
                ['size' => 'M', 'color' => '#FFFFFF', 'colorName' => 'Branco', 'stock' => 10, 'sku' => 'CAM-ESS-M-BRA'],
                ['size' => 'M', 'color' => '#000000', 'colorName' => 'Preto', 'stock' => 15, 'sku' => 'CAM-ESS-M-PRE'],
                ['size' => 'G', 'color' => '#FFFFFF', 'colorName' => 'Branco', 'stock' => 8, 'sku' => 'CAM-ESS-G-BRA'],
                ['size' => 'G', 'color' => '#000000', 'colorName' => 'Preto', 'stock' => 12, 'sku' => 'CAM-ESS-G-PRE'],
                ['size' => 'GG', 'color' => '#000000', 'colorName' => 'Preto', 'stock' => 5, 'sku' => 'CAM-ESS-GG-PRE'],
            ];
        }
        $this->showModal = true;
    }

    public function resetForm()
    {
        $this->reset([
            'name', 'shortDescription', 'fullDescription', 'category', 'price', 'oldPrice',
            'material', 'modelagem', 'gramatura', 'fabricadoEm', 'careInstructions',
            'editingProductId', 'variants', 'uploadedImages', 'existingImages', 'primaryImageIndex',
        ]);
        $this->category = 'Masculino';
        $this->fabricadoEm = 'Brasil';
        $this->variants = [];
        $this->uploadedImages = [];
        $this->existingImages = [];
        $this->primaryImageIndex = 0;
    }

    public function updatedUploadedImages()
    {
        $this->validate([
            'uploadedImages.*' => 'image|max:2048',
        ]);
    }

    public function removeUploadedImage(int $index)
    {
        unset($this->uploadedImages[$index]);
        $this->uploadedImages = array_values($this->uploadedImages);

        if ($this->primaryImageIndex >= count($this->existingImages) + count($this->uploadedImages)) {
            $this->primaryImageIndex = 0;
        }
    }

    public function removeExistingImage(int $index)
    {
        unset($this->existingImages[$index]);
        $this->existingImages = array_values($this->existingImages);

        if ($this->primaryImageIndex >= count($this->existingImages) + count($this->uploadedImages)) {
            $this->primaryImageIndex = 0;
        }
    }

    public function setPrimaryImage(int $index)
    {
        $this->primaryImageIndex = $index;
    }

    public function addVariant()
    {
        $size = 'M';
        $color = '#000000';
        $colorName = 'Preto';
        $this->variants[] = [
            'size' => $size,
            'color' => $color,
            'colorName' => $colorName,
            'stock' => 0,
            'sku' => $this->generateSku($size, $colorName),
        ];
    }

    public function removeVariant(int $index)
    {
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
    }

    public function updatedVariants($value, $key)
    {
        // Quando tamanho ou nome da cor mudar, atualiza o SKU sugerido
        if (str_contains($key, '.size') || str_contains($key, '.colorName')) {
            $index = (int) explode('.', $key)[0];
            if (isset($this->variants[$index])) {
                $size = $this->variants[$index]['size'] ?? 'M';
                $colorName = $this->variants[$index]['colorName'] ?? 'Preto';
                $this->variants[$index]['sku'] = $this->generateSku($size, $colorName);
            }
        }
    }

    private function generateSku(string $size, string $colorName): string
    {
        // Gera prefixo baseado no nome do produto
        $prefix = 'PROD';
        if ($this->name) {
            $words = explode(' ', $this->name);
            $prefix = '';
            foreach (array_slice($words, 0, 2) as $word) {
                $prefix .= strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $word), 0, 3));
            }
            $prefix = $prefix ?: 'PROD';
        }

        // Usa as 3 primeiras letras do nome da cor
        $colorCode = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $colorName), 0, 3));

        return "{$prefix}-{$size}-{$colorCode}";
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'shortDescription' => 'required|min:10',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
        ]);

        // Em produção, salvaria as imagens no storage
        // foreach ($this->uploadedImages as $image) {
        //     $path = $image->store('products', 'public');
        // }

        $message = $this->editingProductId ? 'Produto atualizado!' : 'Produto criado!';
        $this->showModal = false;
        $this->resetForm();
        $this->dispatch('toast', message: $message, type: 'success');
    }

    public function confirmDelete(int $productId)
    {
        $this->deletingProductId = $productId;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->showDeleteModal = false;
        $this->deletingProductId = null;
        $this->dispatch('toast', message: 'Produto excluído!', type: 'success');
    }

    public function render()
    {
        return view('livewire.admin.products', [
            'products' => $this->products,
            'categories' => $this->availableCategories,
        ]);
    }
}
