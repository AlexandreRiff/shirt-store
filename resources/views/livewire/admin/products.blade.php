<div>
    <x-slot name="header">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Produtos</h1>
            <p class="text-sm text-gray-500 hidden sm:block">Gerencie seus {{ count($products) }} produtos</p>
        </div>
    </x-slot>

    <!-- Search and Actions -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 mb-6">
        <div class="relative flex-1 max-w-full sm:max-w-md">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Buscar produtos..."
                class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <button wire:click="openCreateModal"
            class="flex items-center justify-center gap-2 bg-gray-900 text-white px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors whitespace-nowrap">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Novo Produto</span>
        </button>
    </div>

    <!-- Products List -->
    <!-- Products List -->
    <div class="space-y-4">
        @forelse($products as $product)
            <div class="bg-white rounded-xl border border-gray-200 flex flex-col sm:flex-row sm:items-center gap-4 p-4">
                <div
                    class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0 mx-auto sm:mx-0">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 min-w-0 text-center sm:text-left">
                    <h3 class="font-semibold text-gray-900">{{ $product['name'] }}</h3>
                    <p class="text-sm text-gray-500 mt-1 line-clamp-2 sm:line-clamp-1">{{ $product['description'] }}</p>
                    <div
                        class="flex flex-wrap items-center justify-center sm:justify-start gap-x-4 gap-y-1 mt-2 text-sm">
                        <span class="text-gray-500">{{ $product['category'] }}</span>
                        <span class="text-green-600 font-medium">R$
                            {{ number_format($product['price'], 2, ',', '.') }}</span>
                        @if ($product['oldPrice'])
                            <span class="text-gray-400 line-through text-xs">R$
                                {{ number_format($product['oldPrice'], 2, ',', '.') }}</span>
                        @endif
                        <span class="text-gray-500"><span class="text-yellow-500">★</span>
                            {{ $product['rating'] }}</span>
                    </div>
                    <div class="flex items-center justify-center sm:justify-start gap-1 mt-2">
                        @foreach ($product['colors'] as $color)
                            <span class="w-4 h-4 sm:w-5 sm:h-5 rounded-full border border-gray-300"
                                style="background-color: {{ $color }};"></span>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-3 sm:gap-4 flex-shrink-0">
                    @if ($product['stock'] > 0)
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Em
                            Estoque</span>
                    @else
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Sem
                            Estoque</span>
                    @endif
                    <div class="flex items-center gap-2">
                        <button wire:click="openEditModal({{ $product['id'] }})"
                            class="flex items-center gap-1.5 px-3 py-1.5 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <span class="hidden sm:inline">Editar</span>
                        </button>
                        <button wire:click="confirmDelete({{ $product['id'] }})"
                            class="flex items-center gap-1.5 px-3 py-1.5 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            <span class="hidden sm:inline">Excluir</span>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl border border-gray-200 p-8 sm:p-12 text-center">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-1">Nenhum produto encontrado</h3>
                <p class="text-gray-500">Tente buscar por outro termo.</p>
            </div>
        @endforelse
    </div>

    <!-- Create/Edit Modal -->
    @if ($showModal)
        <div class="fixed inset-0 z-[9999] overflow-hidden" x-data="{ activeTab: 'basic' }" x-init="document.body.style.overflow = 'hidden'"
            x-on:remove="document.body.style.overflow = ''">
            <div class="fixed inset-0 bg-black/50" wire:click="$set('showModal', false)"></div>
            <div class="fixed inset-0 flex items-center justify-center p-4 pointer-events-none">
                <div
                    class="relative bg-white rounded-xl shadow-xl w-full max-w-3xl max-h-[90vh] flex flex-col pointer-events-auto">
                    <form wire:submit="save" class="flex flex-col h-full">
                        <!-- Header -->
                        <div class="px-6 pt-6 pb-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $editingProductId ? 'Editar Produto' : 'Novo Produto' }}
                            </h3>
                            <!-- Tabs -->
                            <div class="flex gap-1 mt-4 -mb-4">
                                <button type="button" @click="activeTab = 'basic'"
                                    :class="activeTab === 'basic' ? 'border-blue-600 text-blue-600' :
                                        'border-transparent text-gray-500 hover:text-gray-700'"
                                    class="px-4 py-2 text-sm font-medium border-b-2 transition-colors">Informações</button>
                                <button type="button" @click="activeTab = 'specs'"
                                    :class="activeTab === 'specs' ? 'border-blue-600 text-blue-600' :
                                        'border-transparent text-gray-500 hover:text-gray-700'"
                                    class="px-4 py-2 text-sm font-medium border-b-2 transition-colors">Especificações</button>
                                <button type="button" @click="activeTab = 'variants'"
                                    :class="activeTab === 'variants' ? 'border-blue-600 text-blue-600' :
                                        'border-transparent text-gray-500 hover:text-gray-700'"
                                    class="px-4 py-2 text-sm font-medium border-b-2 transition-colors">Variantes</button>
                                <button type="button" @click="activeTab = 'images'"
                                    :class="activeTab === 'images' ? 'border-blue-600 text-blue-600' :
                                        'border-transparent text-gray-500 hover:text-gray-700'"
                                    class="px-4 py-2 text-sm font-medium border-b-2 transition-colors">Imagens</button>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 overflow-y-auto px-6 py-4">
                            <!-- Tab: Informações Básicas -->
                            <div x-show="activeTab === 'basic'" class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Produto
                                        *</label>
                                    <input wire:model="name" type="text"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Ex: Camiseta Oversized Preta">
                                    @error('name')
                                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Descrição Curta
                                        *</label>
                                    <textarea wire:model="shortDescription" rows="2"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Breve descrição do produto"></textarea>
                                    @error('shortDescription')
                                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Descrição
                                        Completa</label>
                                    <textarea wire:model="fullDescription" rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Descrição detalhada do produto"></textarea>
                                </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Categoria *</label>
                                        <select wire:model="category"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat }}">{{ $cat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Preço (R$)
                                            *</label>
                                        <input wire:model="price" type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="99.90">
                                        @error('price')
                                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Preço
                                            Antigo</label>
                                        <input wire:model="oldPrice" type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="129.90">
                                        <p class="text-xs text-gray-500 mt-1">Para mostrar desconto</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab: Especificações -->
                            <div x-show="activeTab === 'specs'" class="space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Material</label>
                                        <input wire:model="material" type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="95% Algodão, 5% Elastano">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Modelagem</label>
                                        <input wire:model="modelagem" type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="Oversized Fit">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Gramatura</label>
                                        <input wire:model="gramatura" type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="200g/m²">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Fabricado
                                            em</label>
                                        <input wire:model="fabricadoEm" type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="Brasil">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Instruções de
                                        Cuidado</label>
                                    <textarea wire:model="careInstructions" rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Lavar à máquina com água fria (máx. 30°C). Não usar alvejante..."></textarea>
                                </div>
                            </div>

                            <!-- Tab: Variantes -->
                            <div x-show="activeTab === 'variants'" class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-600">Configure estoque por tamanho e cor</p>
                                    <button type="button" wire:click="addVariant"
                                        class="text-sm text-blue-600 hover:text-blue-700 font-medium">+ Adicionar
                                        Variante</button>
                                </div>

                                @if (count($variants) === 0)
                                    <div class="text-center py-8 bg-gray-50 rounded-lg">
                                        <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                        <p class="text-sm text-gray-500">Nenhuma variante adicionada</p>
                                        <p class="text-xs text-gray-400 mt-1">Clique em "Adicionar Variante" para
                                            começar</p>
                                    </div>
                                @endif

                                <div class="space-y-3 max-h-[400px] overflow-y-auto">
                                    @foreach ($variants as $index => $variant)
                                        <div class="border border-gray-200 rounded-lg p-3">
                                            <div class="flex flex-wrap items-center gap-3">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-gray-500">Tamanho:</span>
                                                    <select wire:model.live="variants.{{ $index }}.size"
                                                        class="px-2 py-1.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                        @foreach ($availableSizes as $size)
                                                            <option value="{{ $size }}">{{ $size }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-gray-500">Cor:</span>
                                                    <input type="color"
                                                        wire:model="variants.{{ $index }}.color"
                                                        class="w-8 h-8 border border-gray-300 rounded cursor-pointer p-0.5">
                                                    <input type="text"
                                                        wire:model.live="variants.{{ $index }}.colorName"
                                                        class="w-20 px-2 py-1.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                        placeholder="Preto">
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-gray-500">Estoque:</span>
                                                    <input type="number"
                                                        wire:model="variants.{{ $index }}.stock"
                                                        min="0"
                                                        class="w-16 px-2 py-1.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                        placeholder="0">
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-gray-500">SKU:</span>
                                                    <input type="text"
                                                        wire:model="variants.{{ $index }}.sku"
                                                        class="w-32 px-2 py-1.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                        placeholder="SKU">
                                                </div>
                                                <button type="button"
                                                    wire:click="removeVariant({{ $index }})"
                                                    class="text-gray-400 hover:text-red-500 p-1 ml-auto">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tab: Imagens -->
                            <div x-show="activeTab === 'images'" class="space-y-4">
                                <p class="text-sm text-gray-600">Faça upload das imagens do produto e selecione a
                                    imagem principal</p>

                                <!-- Upload Area -->
                                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false"
                                    x-on:livewire-upload-error="uploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" wire:model="uploadedImages" multiple accept="image/*"
                                        class="hidden" id="product-image-upload">
                                    <label for="product-image-upload" x-show="!uploading"
                                        class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer block">
                                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="text-sm text-gray-600">Clique para selecionar imagens</p>
                                        <p class="text-xs text-gray-400 mt-1">PNG, JPG até 2MB cada</p>
                                    </label>
                                    <div x-show="uploading"
                                        class="border-2 border-dashed border-blue-300 rounded-lg p-6 text-center">
                                        <svg class="animate-spin h-8 w-8 text-blue-600 mx-auto"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        <p class="text-sm text-gray-500 mt-2">Enviando... <span
                                                x-text="progress"></span>%
                                        </p>
                                    </div>
                                </div>

                                @error('uploadedImages.*')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror

                                <!-- Existing Images (when editing) -->
                                @if (count($existingImages) > 0)
                                    <div>
                                        <p class="text-xs text-gray-500 mb-2 font-medium">Imagens atuais
                                            ({{ count($existingImages) }}):</p>
                                        <div class="grid grid-cols-4 gap-3 max-h-[250px] overflow-y-auto p-1">
                                            @foreach ($existingImages as $index => $image)
                                                <div class="relative group">
                                                    <div
                                                        class="aspect-square rounded-lg overflow-hidden bg-gray-100 border-2 {{ $primaryImageIndex === $index ? 'border-blue-500' : 'border-transparent' }}">
                                                        <img src="{{ $image['url'] }}"
                                                            alt="Produto {{ $index + 1 }}"
                                                            class="w-full h-full object-cover">
                                                    </div>
                                                    @if ($primaryImageIndex === $index)
                                                        <span
                                                            class="absolute top-1 left-1 bg-blue-600 text-white text-xs px-1.5 py-0.5 rounded">Principal</span>
                                                    @endif
                                                    <div
                                                        class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center gap-2">
                                                        @if ($primaryImageIndex !== $index)
                                                            <button type="button"
                                                                wire:click="setPrimaryImage({{ $index }})"
                                                                class="p-1.5 bg-white rounded-full text-blue-600 hover:bg-blue-50"
                                                                title="Definir como principal">
                                                                <svg class="w-4 h-4" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        @endif
                                                        <button type="button"
                                                            wire:click="removeExistingImage({{ $index }})"
                                                            class="p-1.5 bg-white rounded-full text-red-600 hover:bg-red-50"
                                                            title="Remover">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Uploaded Images Preview -->
                                @if (count($uploadedImages) > 0)
                                    <div>
                                        <p class="text-xs text-gray-500 mb-2 font-medium">Novas imagens
                                            ({{ count($uploadedImages) }}):</p>
                                        <div class="grid grid-cols-4 gap-3 max-h-[250px] overflow-y-auto p-1">
                                            @foreach ($uploadedImages as $index => $image)
                                                @php $totalIndex = count($existingImages) + $index; @endphp
                                                <div class="relative group">
                                                    <div
                                                        class="aspect-square rounded-lg overflow-hidden bg-gray-100 border-2 {{ $primaryImageIndex === $totalIndex ? 'border-blue-500' : 'border-transparent' }}">
                                                        <img src="{{ $image->temporaryUrl() }}"
                                                            alt="Upload {{ $index + 1 }}"
                                                            class="w-full h-full object-cover">
                                                    </div>
                                                    @if ($primaryImageIndex === $totalIndex)
                                                        <span
                                                            class="absolute top-1 left-1 bg-blue-600 text-white text-xs px-1.5 py-0.5 rounded">Principal</span>
                                                    @endif
                                                    <div
                                                        class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center gap-2">
                                                        @if ($primaryImageIndex !== $totalIndex)
                                                            <button type="button"
                                                                wire:click="setPrimaryImage({{ $totalIndex }})"
                                                                class="p-1.5 bg-white rounded-full text-blue-600 hover:bg-blue-50"
                                                                title="Definir como principal">
                                                                <svg class="w-4 h-4" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        @endif
                                                        <button type="button"
                                                            wire:click="removeUploadedImage({{ $index }})"
                                                            class="p-1.5 bg-white rounded-full text-red-600 hover:bg-red-50"
                                                            title="Remover">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Footer -->
                        <!-- Footer -->
                        <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-200">
                            <button type="button" wire:click="$set('showModal', false)"
                                class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Cancelar</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700">{{ $editingProductId ? 'Salvar Alterações' : 'Criar Produto' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Delete Modal -->
    @if ($showDeleteModal)
        <div class="fixed inset-0 z-[9999] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/50" wire:click="$set('showDeleteModal', false)"></div>
            <div class="relative bg-white rounded-xl shadow-xl w-full max-w-md z-10">
                <div class="px-6 pt-6 pb-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Excluir Produto</h3>
                            <p class="text-sm text-gray-500 mt-1">Tem certeza? Esta ação não pode ser desfeita.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 rounded-b-xl">
                    <button wire:click="$set('showDeleteModal', false)"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">Cancelar</button>
                    <button wire:click="delete"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition-colors">Excluir</button>
                </div>
            </div>
        </div>
    @endif
</div>
