<div>
    <livewire:header />

    <main class="min-h-screen bg-white">
        <nav class="container mx-auto px-4 py-4">
            <ol class="flex items-center gap-2 text-sm text-[hsl(0,0%,45%)]">
                <li><a href="/" class="hover:text-[hsl(0,0%,4%)] transition-colors">Início</a></li>
                <li><span class="mx-1">›</span></li>
                <li><a href="#" class="hover:text-[hsl(0,0%,4%)] transition-colors">Produtos</a></li>
                <li><span class="mx-1">›</span></li>
                <li class="text-[hsl(0,0%,4%)] font-medium">{{ $product['name'] }}</li>
            </ol>
        </nav>

        <section class="container mx-auto px-4 pb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                <div x-data="{ currentImage: 0 }" class="relative">
                    <div class="relative aspect-square overflow-hidden rounded-lg bg-[hsl(0,0%,96%)]">
                        <img :src="$wire.product.images[currentImage]" alt="{{ $product['name'] }}"
                            class="h-full w-full object-cover">
                        @if (count($product['images']) > 1)
                            <button
                                @click="currentImage = currentImage > 0 ? currentImage - 1 : {{ count($product['images']) - 1 }}"
                                class="absolute left-4 top-1/2 -translate-y-1/2 h-10 w-10 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-md hover:bg-white transition-colors">
                                <svg class="h-5 w-5 text-[hsl(0,0%,4%)]" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <button
                                @click="currentImage = currentImage < {{ count($product['images']) - 1 }} ? currentImage + 1 : 0"
                                class="absolute right-4 top-1/2 -translate-y-1/2 h-10 w-10 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-md hover:bg-white transition-colors">
                                <svg class="h-5 w-5 text-[hsl(0,0%,4%)]" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>

                <div class="space-y-6">
                    <span
                        class="inline-flex items-center rounded-full bg-[hsl(0,0%,4%)] px-3 py-1 text-xs font-medium text-white">{{ $product['category'] }}</span>
                    <h1 class="text-3xl md:text-4xl font-bold text-[hsl(0,0%,4%)]">{{ $product['name'] }}</h1>
                    <div class="flex items-center gap-2">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="h-5 w-5 {{ $i <= floor($product['rating']) ? 'text-yellow-400 fill-current' : 'text-gray-300' }}"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                            @endfor
                        </div>
                        <span class="text-sm text-[hsl(0,0%,45%)]">{{ $product['rating'] }} ({{ $product['reviews'] }}
                            avaliações)</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-3xl font-bold text-[hsl(0,0%,4%)]">R$
                            {{ number_format($product['price'], 2, ',', '.') }}</span>
                        @if ($product['old_price'])
                            <span class="text-xl text-[hsl(0,0%,45%)] line-through">R$
                                {{ number_format($product['old_price'], 2, ',', '.') }}</span>
                            <span
                                class="inline-flex items-center rounded-full bg-red-500 px-2.5 py-0.5 text-xs font-semibold text-white">-{{ round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) }}%</span>
                        @endif
                    </div>
                    <p class="text-[hsl(0,0%,45%)] leading-relaxed">{{ $product['description'] }}</p>

                    <div class="space-y-3">
                        <p class="text-sm font-medium text-[hsl(0,0%,4%)]">Cor: <span
                                class="font-normal text-[hsl(0,0%,45%)]">Selecione</span></p>
                        <div class="flex gap-3">
                            @foreach ($product['colors'] as $color)
                                <button wire:click="{{ $color['available'] ? "selectColor('{$color['hex']}')" : '' }}"
                                    class="relative h-10 w-10 rounded-full border-2 transition-all {{ $selectedColor === $color['hex'] ? 'border-[hsl(0,0%,4%)] ring-2 ring-offset-2 ring-[hsl(0,0%,4%)]' : 'border-[hsl(0,0%,90%)]' }} {{ !$color['available'] ? 'opacity-40 cursor-not-allowed' : '' }}"
                                    style="background-color: {{ $color['hex'] }}"
                                    title="{{ $color['name'] }}{{ !$color['available'] ? ' (Indisponível)' : '' }}"
                                    {{ !$color['available'] ? 'disabled' : '' }}>
                                    @if (!$color['available'])
                                        <span class="absolute inset-0 flex items-center justify-center"><span
                                                class="block w-[140%] h-0.5 bg-red-500 rotate-45 absolute"></span></span>
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-sm font-medium text-[hsl(0,0%,4%)]">Tamanho: <span
                                class="font-normal text-[hsl(0,0%,45%)]">Selecione</span></p>
                        <div class="flex gap-2">
                            @foreach ($product['sizes'] as $size)
                                <button wire:click="{{ $size['available'] ? "selectSize('{$size['name']}')" : '' }}"
                                    class="h-11 min-w-[48px] px-4 border rounded-md text-sm font-medium transition-all {{ $selectedSize === $size['name'] ? 'border-[hsl(0,0%,4%)] bg-[hsl(0,0%,4%)] text-white' : 'border-[hsl(0,0%,90%)] text-[hsl(0,0%,4%)]' }} {{ !$size['available'] ? 'opacity-40 cursor-not-allowed line-through' : 'hover:border-[hsl(0,0%,70%)]' }}"
                                    {{ !$size['available'] ? 'disabled' : '' }}
                                    title="{{ !$size['available'] ? 'Indisponível' : '' }}">{{ $size['name'] }}</button>
                            @endforeach
                        </div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-sm font-medium text-[hsl(0,0%,4%)]">Quantidade</p>
                        <div class="flex items-center border border-[hsl(0,0%,90%)] rounded-md w-fit">
                            <button wire:click="decrementQuantity"
                                class="h-11 w-11 flex items-center justify-center text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)] transition-colors"><svg
                                    class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg></button>
                            <span class="w-12 text-center font-medium text-[hsl(0,0%,4%)]">{{ $quantity }}</span>
                            <button wire:click="incrementQuantity"
                                class="h-11 w-11 flex items-center justify-center text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)] transition-colors"><svg
                                    class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg></button>
                        </div>
                    </div>
                    <button
                        class="w-full h-14 bg-[hsl(0,0%,4%)] text-white font-medium rounded-md hover:bg-[hsl(0,0%,15%)] transition-colors">Adicionar
                        ao Carrinho</button>
                    <div class="space-y-3 pt-4 border-t border-[hsl(0,0%,90%)]">
                        <div class="flex items-center gap-3 text-sm text-[hsl(0,0%,45%)]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>
                            <span>Frete grátis acima de R$ 200</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-[hsl(0,0%,45%)]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            <span>Troca grátis em até 30 dias</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-t border-[hsl(0,0%,90%)]">
            <div class="grid grid-cols-3 border-b border-[hsl(0,0%,90%)]">
                <button wire:click="setTab('description')"
                    class="py-4 text-sm font-medium text-center transition-colors border-b-2 -mb-px {{ $activeTab === 'description' ? 'border-[hsl(0,0%,4%)] text-[hsl(0,0%,4%)]' : 'border-transparent text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)]' }}">Descrição</button>
                <button wire:click="setTab('specifications')"
                    class="py-4 text-sm font-medium text-center transition-colors border-b-2 -mb-px {{ $activeTab === 'specifications' ? 'border-[hsl(0,0%,4%)] text-[hsl(0,0%,4%)]' : 'border-transparent text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)]' }}">Especificações</button>
                <button wire:click="setTab('care')"
                    class="py-4 text-sm font-medium text-center transition-colors border-b-2 -mb-px {{ $activeTab === 'care' ? 'border-[hsl(0,0%,4%)] text-[hsl(0,0%,4%)]' : 'border-transparent text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)]' }}">Cuidados</button>
            </div>
            <div class="container mx-auto px-4 py-8">
                @if ($activeTab === 'description')
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-[hsl(0,0%,4%)]">Sobre o Produto</h3>
                        <p class="text-sm text-[hsl(0,0%,45%)] leading-relaxed">{{ $product['description'] }}</p>
                        <p class="text-sm text-[hsl(0,0%,45%)] leading-relaxed">{{ $product['full_description'] }}</p>
                    </div>
                @elseif($activeTab === 'specifications')
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-[hsl(0,0%,4%)]">Especificações Técnicas</h3>
                        <div class="space-y-0">
                            <div class="flex py-4 border-b border-[hsl(0,0%,90%)]">
                                <span class="font-medium text-[hsl(0,0%,4%)] w-36">Material:</span>
                                <span class="text-[hsl(0,0%,45%)]">95% Algodão, 5% Elastano</span>
                            </div>
                            <div class="flex py-4 border-b border-[hsl(0,0%,90%)]">
                                <span class="font-medium text-[hsl(0,0%,4%)] w-36">Modelagem:</span>
                                <span class="text-[hsl(0,0%,45%)]">Oversized Fit</span>
                            </div>
                            <div class="flex py-4 border-b border-[hsl(0,0%,90%)]">
                                <span class="font-medium text-[hsl(0,0%,4%)] w-36">Gramatura:</span>
                                <span class="text-[hsl(0,0%,45%)]">200g/m²</span>
                            </div>
                            <div class="flex py-4 border-b border-[hsl(0,0%,90%)]">
                                <span class="font-medium text-[hsl(0,0%,4%)] w-36">Fabricado em:</span>
                                <span class="text-[hsl(0,0%,45%)]">Brasil</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-[hsl(0,0%,4%)]">Instruções de Cuidado</h3>
                        <p class="text-sm text-[hsl(0,0%,45%)] leading-relaxed">Lavar à máquina com água fria (máx.
                            30°C). Não usar alvejante. Secar à sombra.</p>
                        <div class="bg-[hsl(0,0%,96%)] p-4 rounded-lg mt-4">
                            <h4 class="font-medium text-[hsl(0,0%,4%)] mb-2">Dicas Importantes:</h4>
                            <ul class="list-disc list-inside space-y-1 text-sm text-[hsl(0,0%,45%)]">
                                <li>Não torcer a peça após a lavagem</li>
                                <li>Secar à sombra para preservar as cores</li>
                                <li>Passar em temperatura média se necessário</li>
                                <li>Evitar contato com produtos químicos fortes</li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <section class="container mx-auto px-4 py-12 border-t border-[hsl(0,0%,90%)]">
            <h2 class="text-2xl md:text-3xl font-bold text-[hsl(0,0%,4%)] mb-8">Produtos Relacionados</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($relatedProducts as $related)
                    <a href="/produto/{{ $related['id'] }}" wire:navigate class="group block">
                        <div class="relative aspect-square overflow-hidden rounded-lg bg-[hsl(0,0%,96%)] mb-4">
                            <img src="{{ $related['images'][0] }}" alt="{{ $related['name'] }}"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <button
                                class="absolute top-3 right-3 h-10 w-10 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-md opacity-0 group-hover:opacity-100 transition-all"><svg
                                    class="h-4 w-4 text-[hsl(0,0%,4%)]" fill="none" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg></button>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                <span
                                    class="block w-full h-9 bg-[hsl(0,0%,96%)] text-[hsl(0,0%,4%)] text-sm font-medium rounded-md flex items-center justify-center">Ver
                                    Detalhes</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div>
                                <h3 class="font-medium text-sm text-[hsl(0,0%,4%)] line-clamp-1">
                                    {{ $related['name'] }}</h3>
                                <p class="text-xs text-[hsl(0,0%,45%)]">{{ $related['category'] }}</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="h-3 w-3 fill-current text-yellow-500" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <span class="text-xs font-medium text-[hsl(0,0%,4%)]">{{ $related['rating'] }}</span>
                                <span class="text-xs text-[hsl(0,0%,45%)]">({{ $related['reviews'] }})</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-[hsl(0,0%,4%)]">R$
                                    {{ number_format($related['price'], 2, ',', '.') }}</span>
                                @if ($related['old_price'])
                                    <span class="text-sm text-[hsl(0,0%,45%)] line-through">R$
                                        {{ number_format($related['old_price'], 2, ',', '.') }}</span>
                                @endif
                            </div>
                            <div class="flex gap-1.5">
                                @foreach ($related['colors'] as $color)
                                    <div class="h-5 w-5 rounded-full border-2 border-[hsl(0,0%,90%)]"
                                        style="background-color: {{ $color['hex'] }}" title="{{ $color['name'] }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
    <livewire:footer />
</div>
