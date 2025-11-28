<div x-data="{ filtersOpen: false }">
    <livewire:header />

    <main class="min-h-screen bg-white">
        <div class="container mx-auto px-4 py-8">
            {{-- Page Title --}}
            <div class="mb-6">
                <h1 class="text-3xl md:text-4xl font-bold text-[hsl(0,0%,4%)]">Todos os Produtos</h1>
                <p class="text-[hsl(0,0%,45%)] mt-2">Encontramos {{ $totalProducts }} produtos</p>
            </div>

            {{-- Mobile Controls: Filters Button + Sort Dropdown --}}
            <div class="flex items-center justify-between gap-4 mb-6 lg:hidden">
                <button @click="filtersOpen = true"
                    class="flex items-center gap-2 px-4 py-2.5 border border-[hsl(0,0%,90%)] rounded-lg font-medium text-sm text-[hsl(0,0%,4%)] hover:bg-[hsl(0,0%,96%)] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    Filtros
                </button>
                <select wire:model.live="sortBy"
                    class="px-4 py-2.5 border border-[hsl(0,0%,90%)] rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[hsl(0,0%,4%)] bg-white appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3csvg%20xmlns%3d%22http%3a%2f%2fwww.w3.org%2f2000%2fsvg%22%20width%3d%2224%22%20height%3d%2224%22%20viewBox%3d%220%200%2024%2024%22%20fill%3d%22none%22%20stroke%3d%22currentColor%22%20stroke-width%3d%222%22%20stroke-linecap%3d%22round%22%20stroke-linejoin%3d%22round%22%3e%3cpolyline%20points%3d%226%209%2012%2015%2018%209%22%3e%3c%2fpolyline%3e%3c%2fsvg%3e')] bg-no-repeat bg-[right_0.75rem_center] bg-[length:1rem] pr-8">
                    <option value="featured">Em Destaque</option>
                    <option value="newest">Mais Recentes</option>
                    <option value="price_asc">Menor Preço</option>
                    <option value="price_desc">Maior Preço</option>
                    <option value="rating">Melhor Avaliação</option>
                </select>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Desktop Sidebar Filters --}}
                <aside class="hidden lg:block w-64 flex-shrink-0">
                    {{-- Sort Dropdown --}}
                    <div class="mb-6">
                        <select wire:model.live="sortBy"
                            class="w-full px-4 py-3 border border-[hsl(0,0%,90%)] rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[hsl(0,0%,4%)] bg-white">
                            <option value="featured">Em Destaque</option>
                            <option value="newest">Mais Recentes</option>
                            <option value="price_asc">Menor Preço</option>
                            <option value="price_desc">Maior Preço</option>
                            <option value="rating">Melhor Avaliação</option>
                        </select>
                    </div>

                    {{-- Categories Filter --}}
                    <div class="mb-6">
                        <h3 class="font-semibold text-[hsl(0,0%,4%)] mb-4">Categorias</h3>
                        <div class="space-y-3">
                            @foreach ($categories as $category)
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" wire:model.live="selectedCategories"
                                        value="{{ $category['id'] }}"
                                        class="w-5 h-5 rounded border-[hsl(0,0%,80%)] text-[hsl(0,0%,4%)] focus:ring-[hsl(0,0%,4%)] focus:ring-offset-0">
                                    <span
                                        class="text-sm text-[hsl(0,0%,25%)] group-hover:text-[hsl(0,0%,4%)]">{{ $category['name'] }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Price Filter --}}
                    <div class="mb-6">
                        <h3 class="font-semibold text-[hsl(0,0%,4%)] mb-4">Preço</h3>
                        <div class="px-1">
                            <input type="range" wire:model.live.debounce.300ms="maxPrice" min="0"
                                max="150"
                                class="w-full h-1 bg-[hsl(0,0%,4%)] rounded-lg appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-white [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-[hsl(0,0%,4%)] [&::-webkit-slider-thumb]:cursor-pointer">
                            <div class="flex justify-between mt-3 text-sm text-[hsl(0,0%,45%)]">
                                <span>R$ {{ $minPrice }}</span>
                                <span>R$ {{ $maxPrice }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Colors Filter --}}
                    <div class="mb-6">
                        <h3 class="font-semibold text-[hsl(0,0%,4%)] mb-4">Cores</h3>
                        <div class="space-y-3 max-h-80 overflow-y-auto">
                            @foreach ($availableColors as $colorName => $colorHex)
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" wire:model.live="selectedColors" value="{{ $colorName }}"
                                        class="w-5 h-5 rounded border-[hsl(0,0%,80%)] text-[hsl(0,0%,4%)] focus:ring-[hsl(0,0%,4%)] focus:ring-offset-0">
                                    <span
                                        class="text-sm text-[hsl(0,0%,25%)] group-hover:text-[hsl(0,0%,4%)]">{{ $colorName }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Clear Filters --}}
                    <button wire:click="clearFilters"
                        class="w-full py-3 border border-[hsl(0,0%,90%)] rounded-lg text-sm font-medium text-[hsl(0,0%,25%)] hover:bg-[hsl(0,0%,96%)] transition-colors">
                        Limpar Filtros
                    </button>
                </aside>

                {{-- Products Grid --}}
                <div class="flex-1">
                    @if ($productsData->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                            @foreach ($productsData as $product)
                                <a href="/produto/{{ $product['slug'] }}" wire:navigate
                                    wire:key="product-{{ $product['id'] }}" class="group block animate-fade-in">
                                    {{-- Image Container --}}
                                    <div
                                        class="relative aspect-square overflow-hidden rounded-lg bg-[hsl(0,0%,96%)] mb-4">
                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                            loading="lazy">

                                        {{-- Discount Badge --}}
                                        @if ($product['discount'])
                                            <span
                                                class="absolute top-3 left-3 inline-flex items-center rounded-full bg-[hsl(0,84%,60%)] px-2.5 py-0.5 text-xs font-semibold text-white">
                                                -{{ $product['discount'] }}%
                                            </span>
                                        @endif

                                        {{-- Favorite Button --}}
                                        <button
                                            class="absolute top-3 right-3 h-10 w-10 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-md opacity-0 group-hover:opacity-100 transition-all hover:bg-white">
                                            <svg class="h-4 w-4 text-[hsl(0,0%,4%)]" fill="none"
                                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                        </button>

                                        {{-- Quick View --}}
                                        <div
                                            class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                            <span
                                                class="block w-full text-center py-2 bg-[hsl(0,0%,96%)] text-[hsl(0,0%,4%)] text-sm font-medium rounded-md">
                                                Ver Detalhes
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Product Info --}}
                                    <div class="space-y-2">
                                        <div>
                                            <h3 class="font-medium text-sm text-[hsl(0,0%,4%)] line-clamp-1">
                                                {{ $product['name'] }}</h3>
                                            <p class="text-xs text-[hsl(0,0%,45%)] capitalize">
                                                {{ $product['category'] }}
                                            </p>
                                        </div>

                                        {{-- Rating --}}
                                        <div class="flex items-center gap-1">
                                            <svg class="h-3 w-3 fill-current text-yellow-500" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            <span
                                                class="text-xs font-medium text-[hsl(0,0%,4%)]">{{ $product['rating'] }}</span>
                                            <span
                                                class="text-xs text-[hsl(0,0%,45%)]">({{ $product['reviews'] }})</span>
                                        </div>

                                        {{-- Price --}}
                                        <div class="flex items-center gap-2">
                                            <span class="font-bold text-[hsl(0,0%,4%)]">R$
                                                {{ number_format($product['price'], 2, ',', '.') }}</span>
                                            @if ($product['old_price'])
                                                <span class="text-sm text-[hsl(0,0%,45%)] line-through">R$
                                                    {{ number_format($product['old_price'], 2, ',', '.') }}</span>
                                            @endif
                                        </div>

                                        {{-- Colors --}}
                                        @if (!empty($product['colors']))
                                            <div class="flex gap-1.5">
                                                @foreach (array_slice($product['colors'], 0, 4) as $color)
                                                    <div class="h-5 w-5 rounded-full border-2 border-[hsl(0,0%,90%)]"
                                                        style="background-color: {{ $color }}"></div>
                                                @endforeach
                                                @if (count($product['colors']) > 4)
                                                    <span
                                                        class="text-xs text-[hsl(0,0%,45%)] self-center">+{{ count($product['colors']) - 4 }}</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        {{-- Empty State --}}
                        <div class="text-center py-16">
                            <svg class="mx-auto h-16 w-16 text-[hsl(0,0%,80%)]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-[hsl(0,0%,4%)]">Nenhum produto encontrado</h3>
                            <p class="mt-2 text-[hsl(0,0%,45%)]">Tente ajustar os filtros para encontrar o que procura.
                            </p>
                            <button wire:click="clearFilters"
                                class="mt-6 px-6 py-2 bg-[hsl(0,0%,4%)] text-white rounded-lg hover:bg-[hsl(0,0%,15%)] transition-colors">
                                Limpar Filtros
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    {{-- Mobile Filters Modal --}}
    <div x-show="filtersOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="filtersOpen = false"
        class="fixed inset-0 bg-black/50 z-[60] lg:hidden" x-cloak></div>

    <div x-show="filtersOpen" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 w-full max-w-md bg-white z-[70] shadow-2xl lg:hidden overflow-y-auto" x-cloak>

        {{-- Modal Header --}}
        <div class="sticky top-0 bg-white border-b border-[hsl(0,0%,90%)] px-6 py-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold text-[hsl(0,0%,4%)]">Filtros</h2>
            <button @click="filtersOpen = false"
                class="p-2 text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)] transition-colors rounded-full hover:bg-[hsl(0,0%,96%)]">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Modal Content --}}
        <div class="px-6 py-6">
            {{-- Categories Filter --}}
            <div class="mb-8">
                <h3 class="font-semibold text-[hsl(0,0%,4%)] mb-4">Categorias</h3>
                <div class="space-y-4">
                    @foreach ($categories as $category)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" wire:model.live="selectedCategories"
                                value="{{ $category['id'] }}"
                                class="w-5 h-5 rounded border-[hsl(0,0%,80%)] text-[hsl(0,0%,4%)] focus:ring-[hsl(0,0%,4%)] focus:ring-offset-0">
                            <span
                                class="text-base text-[hsl(0,0%,25%)] group-hover:text-[hsl(0,0%,4%)]">{{ $category['name'] }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Price Range Filter --}}
            <div class="mb-8">
                <h3 class="font-semibold text-[hsl(0,0%,4%)] mb-4">Preço</h3>
                <div class="px-1">
                    <input type="range" wire:model.live.debounce.300ms="maxPrice" min="0" max="150"
                        class="w-full h-1 bg-[hsl(0,0%,4%)] rounded-lg appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-white [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-[hsl(0,0%,4%)] [&::-webkit-slider-thumb]:cursor-pointer">
                    <div class="flex justify-between mt-3 text-sm text-[hsl(0,0%,45%)]">
                        <span>R$ {{ $minPrice }}</span>
                        <span>R$ {{ $maxPrice }}</span>
                    </div>
                </div>
            </div>

            {{-- Colors Filter --}}
            <div class="mb-8">
                <h3 class="font-semibold text-[hsl(0,0%,4%)] mb-4">Cores</h3>
                <div class="space-y-4">
                    @foreach ($availableColors as $colorName => $colorHex)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" wire:model.live="selectedColors" value="{{ $colorName }}"
                                class="w-5 h-5 rounded border-[hsl(0,0%,80%)] text-[hsl(0,0%,4%)] focus:ring-[hsl(0,0%,4%)] focus:ring-offset-0">
                            <span
                                class="text-base text-[hsl(0,0%,25%)] group-hover:text-[hsl(0,0%,4%)]">{{ $colorName }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Clear Filters --}}
            <button wire:click="clearFilters"
                class="w-full py-3 border border-[hsl(0,0%,90%)] rounded-lg text-sm font-medium text-[hsl(0,0%,25%)] hover:bg-[hsl(0,0%,96%)] transition-colors mb-4">
                Limpar Filtros
            </button>

            {{-- Apply Filters --}}
            <button @click="filtersOpen = false"
                class="w-full py-3 bg-[hsl(0,0%,4%)] text-white rounded-lg text-sm font-medium hover:bg-[hsl(0,0%,15%)] transition-colors">
                Aplicar Filtros
            </button>
        </div>
    </div>

    <livewire:footer />
</div>
