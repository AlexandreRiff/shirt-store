<section id="produtos" class="py-12 md:py-24">
    <div class="container mx-auto px-4">
        {{-- Section Header --}}
        <div class="text-center mb-8 md:mb-12 space-y-4">
            <h2 class="text-3xl md:text-4xl font-bold text-[hsl(0,0%,4%)]">Produtos em Destaque</h2>
            <p class="text-[hsl(0,0%,45%)] max-w-2xl mx-auto">
                Descubra nossa seleção exclusiva de camisetas premium. Design moderno, conforto superior.
            </p>
        </div>

        {{-- Products Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @foreach ($products as $product)
                <a href="/produto/{{ $product['slug'] }}" wire:navigate class="group block animate-fade-in">
                    {{-- Image Container --}}
                    <div class="relative aspect-square overflow-hidden rounded-lg bg-[hsl(0,0%,96%)] mb-4">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">

                        {{-- Discount Badge --}}
                        @if ($product['discount'])
                            <span
                                class="absolute top-3 left-3 inline-flex items-center rounded-full bg-[hsl(0,84%,60%)] px-2.5 py-0.5 text-xs font-semibold text-white">
                                -{{ $product['discount'] }}%
                            </span>
                        @endif

                        {{-- Favorite Button --}}
                        <button
                            class="absolute top-3 right-3 h-10 w-10 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-md opacity-0 group-hover:opacity-100 transition-all">
                            <svg class="h-4 w-4 text-[hsl(0,0%,4%)]" fill="none" stroke="currentColor"
                                stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>

                        {{-- Quick View --}}
                        <div
                            class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                            <button
                                class="w-full h-9 bg-[hsl(0,0%,96%)] text-[hsl(0,0%,4%)] text-sm font-medium rounded-md hover:bg-[hsl(0,0%,90%)] transition-colors">
                                Ver Detalhes
                            </button>
                        </div>
                    </div>

                    {{-- Product Info --}}
                    <div class="space-y-2">
                        <div>
                            <h3 class="font-medium text-sm text-[hsl(0,0%,4%)] line-clamp-1">{{ $product['name'] }}</h3>
                            <p class="text-xs text-[hsl(0,0%,45%)] capitalize">{{ $product['category'] }}</p>
                        </div>

                        {{-- Rating --}}
                        <div class="flex items-center gap-1">
                            <svg class="h-3 w-3 fill-current text-yellow-500" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <span class="text-xs font-medium text-[hsl(0,0%,4%)]">{{ $product['rating'] }}</span>
                            <span class="text-xs text-[hsl(0,0%,45%)]">({{ $product['reviews'] }})</span>
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
                        <div class="flex gap-1.5">
                            @foreach ($product['colors'] as $color)
                                <div class="h-5 w-5 rounded-full border-2 border-[hsl(0,0%,90%)]"
                                    style="background-color: {{ $color }}" title="{{ $color }}"></div>
                            @endforeach
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- View All Button --}}
        <div class="text-center">
            <a href="/produtos" wire:navigate
                class="inline-flex items-center justify-center gap-2 h-11 px-8 border border-[hsl(0,0%,90%)] text-[hsl(0,0%,4%)] text-sm font-medium rounded-md hover:bg-[hsl(0,0%,96%)] hover:text-[hsl(217,100%,50%)] transition-colors">
                Ver Todos os Produtos
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
