<footer class="bg-[hsl(0,0%,4%)] text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            {{-- About --}}
            <div>
                <h3 class="font-bold text-lg mb-4">NOME DA LOJA</h3>
                <p class="text-sm opacity-90">Camisetas premium com design moderno e qualidade excepcional.</p>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="font-semibold mb-4">Links Úteis</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="opacity-90 hover:opacity-100 transition-opacity">Produtos</a></li>
                    <li><a href="#" class="opacity-90 hover:opacity-100 transition-opacity">Sobre Nós</a></li>
                    <li><a href="#" class="opacity-90 hover:opacity-100 transition-opacity">Contato</a></li>
                </ul>
            </div>

            {{-- Customer Service --}}
            <div>
                <h4 class="font-semibold mb-4">Atendimento</h4>
                <ul class="space-y-2 text-sm">
                    <li class="opacity-90">Segunda a Sexta: 9h - 18h</li>
                    <li class="opacity-90">Sábado: 9h - 14h</li>
                    <li class="opacity-90">contato@urbanthreads.com</li>
                    <li class="opacity-90">(11) 9999-9999</li>
                </ul>
            </div>

            {{-- Newsletter --}}
            <div>
                <h4 class="font-semibold mb-4">Newsletter</h4>
                <p class="text-sm opacity-90 mb-4">Receba novidades e ofertas exclusivas</p>
                <form class="flex gap-2">
                    <input type="email" placeholder="Seu e-mail" required
                        class="flex-1 px-4 py-2 bg-white text-[hsl(0,0%,4%)] text-sm rounded-md placeholder:text-[hsl(0,0%,45%)] focus:outline-none focus:ring-2 focus:ring-[hsl(217,100%,50%)]">
                    <button type="submit"
                        class="px-4 py-2 bg-[hsl(0,0%,96%)] text-[hsl(0,0%,4%)] rounded-md hover:bg-white transition-colors">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- Social & Copyright --}}
        <div class="border-t border-white/20 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm opacity-80">© 2025 Nome da Loja. Todos os direitos reservados.</p>
                <div class="flex gap-4">
                    <a href="#" class="opacity-80 hover:opacity-100 transition-opacity">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="opacity-80 hover:opacity-100 transition-opacity">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                        </svg>
                    </a>
                    <a href="#" class="opacity-80 hover:opacity-100 transition-opacity">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
