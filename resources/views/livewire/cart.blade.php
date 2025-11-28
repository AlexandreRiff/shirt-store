<div class="min-h-screen flex flex-col">
    <livewire:header />

    <main class="flex-1 container mx-auto px-4 py-12">
        @if (count($cartItems) === 0)
            {{-- Carrinho Vazio --}}
            <div class="max-w-md mx-auto text-center space-y-6 py-24">
                <svg class="h-24 w-24 mx-auto text-[hsl(0,0%,45%)]" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <h1 class="text-3xl font-bold text-[hsl(0,0%,4%)]">Seu carrinho está vazio</h1>
                <p class="text-[hsl(0,0%,45%)]">Adicione produtos ao seu carrinho para continuar</p>
                <a href="{{ route('products.index') }}" wire:navigate
                    class="inline-flex items-center justify-center px-8 py-3 bg-[hsl(0,0%,4%)] text-white font-medium rounded-md hover:bg-[hsl(0,0%,15%)] transition-colors">
                    Ver Produtos
                </a>
            </div>
        @else
            {{-- Carrinho com itens --}}
            <h1 class="text-3xl md:text-4xl font-bold text-[hsl(0,0%,4%)] mb-8">Carrinho de Compras</h1>

            <div class="grid lg:grid-cols-[1fr_400px] gap-12">
                {{-- Lista de Produtos --}}
                <div class="space-y-6">
                    @foreach ($cartItems as $index => $item)
                        <div class="flex gap-6 p-6 bg-white rounded-lg border border-[hsl(0,0%,90%)]">
                            <div class="w-24 h-24 rounded-lg overflow-hidden bg-[hsl(0,0%,96%)] flex-shrink-0">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                    class="w-full h-full object-cover">
                            </div>

                            <div class="flex-1 space-y-2">
                                <div class="flex justify-between">
                                    <div>
                                        <h3 class="font-semibold text-[hsl(0,0%,4%)]">{{ $item['name'] }}</h3>
                                        <p class="text-sm text-[hsl(0,0%,45%)]">
                                            {{ $item['color'] ?? '' }} / {{ $item['size'] ?? '' }}
                                        </p>
                                    </div>
                                    <button wire:click="removeItem({{ $index }})"
                                        class="h-8 w-8 flex items-center justify-center text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)] transition-colors">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex items-center justify-between">
                                    {{-- Controle de quantidade --}}
                                    <div class="flex items-center gap-3">
                                        <button
                                            wire:click="updateQuantity({{ $index }}, {{ $item['quantity'] - 1 }})"
                                            class="h-8 w-8 flex items-center justify-center border border-[hsl(0,0%,90%)] rounded-md text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)] hover:border-[hsl(0,0%,70%)] transition-colors">
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                            </svg>
                                        </button>
                                        <span
                                            class="font-medium min-w-[30px] text-center text-[hsl(0,0%,4%)]">{{ $item['quantity'] }}</span>
                                        <button
                                            wire:click="updateQuantity({{ $index }}, {{ $item['quantity'] + 1 }})"
                                            class="h-8 w-8 flex items-center justify-center border border-[hsl(0,0%,90%)] rounded-md text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)] hover:border-[hsl(0,0%,70%)] transition-colors">
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </button>
                                    </div>

                                    <p class="font-bold text-lg text-[hsl(0,0%,4%)]">
                                        R$ {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Resumo do Pedido --}}
                <div class="lg:sticky lg:top-24 h-fit">
                    <div class="bg-white rounded-lg border border-[hsl(0,0%,90%)] p-6 space-y-6">
                        <h2 class="text-2xl font-bold text-[hsl(0,0%,4%)]">Resumo do Pedido</h2>

                        <div class="space-y-3">
                            <div class="flex justify-between text-[hsl(0,0%,45%)]">
                                <span>Subtotal ({{ $this->totalItems }}
                                    {{ $this->totalItems === 1 ? 'item' : 'itens' }})</span>
                                <span>R$ {{ number_format($this->subtotal, 2, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-[hsl(0,0%,45%)]">
                                <span>Frete</span>
                                <span class="text-green-600 font-semibold">Grátis</span>
                            </div>

                            <div class="border-t border-[hsl(0,0%,90%)] my-4"></div>

                            <div class="flex justify-between text-lg font-bold text-[hsl(0,0%,4%)]">
                                <span>Total</span>
                                <span>R$ {{ number_format($this->subtotal, 2, ',', '.') }}</span>
                            </div>
                        </div>

                        <button
                            class="w-full py-3 bg-[hsl(0,0%,4%)] text-white font-medium rounded-md hover:bg-[hsl(0,0%,15%)] transition-colors">
                            Ir para Checkout
                        </button>

                        <a href="{{ route('products.index') }}" wire:navigate
                            class="w-full py-3 border border-[hsl(0,0%,90%)] text-[hsl(0,0%,4%)] font-medium rounded-md hover:bg-[hsl(0,0%,96%)] transition-colors flex items-center justify-center">
                            Continuar Comprando
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </main>

    <livewire:footer />
</div>
