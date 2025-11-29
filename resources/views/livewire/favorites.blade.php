<div class="min-h-screen flex flex-col">
    <livewire:header />

    <main class="flex-1 container mx-auto px-4 py-12">
        {{-- Favoritos Vazio --}}
        <div class="max-w-md mx-auto text-center space-y-6 py-24">
            <svg class="h-24 w-24 mx-auto text-[hsl(0,0%,45%)]" fill="none" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
            <h1 class="text-3xl font-bold text-[hsl(0,0%,4%)]">Nenhum favorito ainda</h1>
            <p class="text-[hsl(0,0%,45%)]">Adicione produtos aos favoritos clicando no ícone de coração</p>
            <a href="{{ route('products.index') }}" wire:navigate
                class="inline-flex items-center justify-center px-8 py-3 bg-[hsl(0,0%,4%)] text-white font-medium rounded-md hover:bg-[hsl(0,0%,15%)] transition-colors">
                Explorar Produtos
            </a>
        </div>
    </main>

    <livewire:footer />
</div>
