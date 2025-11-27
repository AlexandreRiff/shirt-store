<div x-data="{ mobileMenuOpen: false, searchOpen: false }">
    <header
        class="sticky top-0 z-50 w-full border-b border-[hsl(0,0%,90%)] bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/60">
        <div class="container mx-auto px-4">
            <div x-show="!searchOpen" class="flex h-16 items-center justify-between">
                <button @click="mobileMenuOpen = true"
                    class="lg:hidden p-2 text-[hsl(0,0%,4%)] hover:text-[hsl(217,100%,50%)] transition-colors"
                    aria-label="Abrir menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <a href="/"
                    class="flex items-center lg:flex-none absolute left-1/2 -translate-x-1/2 lg:static lg:translate-x-0"
                    aria-label="Urban Threads - Página inicial">
                    <h1 class="text-lg md:text-xl font-bold tracking-tight whitespace-nowrap">NOME DA LOJA</h1>
                </a>
                <nav class="hidden lg:flex items-center space-x-8" aria-label="Menu de navegação principal">
                    @foreach ($menuItems as $item)
                        <a href="#"
                            class="text-sm font-medium text-[hsl(0,0%,4%)] hover:text-[hsl(217,100%,50%)] transition-colors">{{ $item }}</a>
                    @endforeach
                </nav>
                <div class="flex items-center space-x-2">
                    <button @click="searchOpen = true; $nextTick(() => $refs.searchInput.focus())"
                        class="p-2 text-[hsl(0,0%,4%)] hover:text-[hsl(217,100%,50%)] transition-colors"
                        aria-label="Abrir busca">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                    <button
                        class="hidden md:flex p-2 text-[hsl(0,0%,4%)] hover:text-[hsl(217,100%,50%)] transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </button>
                    <button
                        class="hidden md:flex p-2 text-[hsl(0,0%,4%)] hover:text-[hsl(217,100%,50%)] transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </button>
                    <button class="relative p-2 text-[hsl(0,0%,4%)] hover:text-[hsl(217,100%,50%)] transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div x-show="searchOpen" x-cloak class="flex h-16 items-center gap-3 px-2">
                <svg class="h-5 w-5 text-[hsl(0,0%,45%)] flex-shrink-0" fill="none" stroke="currentColor"
                    stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <input x-ref="searchInput" type="text" placeholder="Buscar produtos..."
                    @keydown.escape="searchOpen = false"
                    class="flex-1 h-10 bg-transparent text-[hsl(0,0%,4%)] placeholder:text-[hsl(0,0%,45%)] focus:outline-none text-base">
                <button @click="searchOpen = false"
                    class="p-2 text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)] transition-colors"
                    aria-label="Fechar busca">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </header>
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black/50 z-[60] lg:hidden" x-cloak></div>
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 w-80 max-w-[85vw] bg-white z-[70] shadow-2xl lg:hidden" x-cloak>
        <div class="flex justify-end p-4 border-b border-[hsl(0,0%,90%)]">
            <button @click="mobileMenuOpen = false"
                class="p-2 text-[hsl(0,0%,45%)] hover:text-[hsl(0,0%,4%)] transition-colors rounded-full hover:bg-[hsl(0,0%,96%)]"
                aria-label="Fechar menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="px-6 py-6" aria-label="Menu de navegação mobile">
            <ul class="space-y-2">
                @foreach ($menuItems as $item)
                    <li>
                        <a href="#" @click="mobileMenuOpen = false"
                            class="block py-3 text-lg font-medium text-[hsl(0,0%,4%)] hover:text-[hsl(217,100%,50%)] transition-colors">{{ $item }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
