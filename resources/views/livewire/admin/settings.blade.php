<div>
    <x-slot name="header">
        <div class="truncate">
            <h1 class="text-lg sm:text-2xl font-bold text-gray-900 truncate">Configurações</h1>
            <p class="text-xs sm:text-sm text-gray-500 truncate hidden sm:block">Gerencie as configurações da sua loja
            </p>
        </div>
    </x-slot>

    <!-- Tabs Navigation -->
    <div class="bg-white rounded-xl border border-gray-200 mb-6 overflow-hidden">
        <nav class="flex overflow-x-auto scrollbar-hide">
            <button wire:click="setTab('loja')" type="button"
                class="flex-1 min-w-[100px] flex items-center justify-center gap-2 px-3 sm:px-4 py-4 text-sm font-medium transition-colors relative whitespace-nowrap {{ $activeTab === 'loja' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="hidden sm:inline">Loja</span>
                @if ($activeTab === 'loja')
                    <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-900"></span>
                @endif
            </button>

            <button wire:click="setTab('pagamento')" type="button"
                class="flex-1 min-w-[100px] flex items-center justify-center gap-2 px-3 sm:px-4 py-4 text-sm font-medium transition-colors relative whitespace-nowrap {{ $activeTab === 'pagamento' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                    </path>
                </svg>
                <span class="hidden sm:inline">Pagamento</span>
                @if ($activeTab === 'pagamento')
                    <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-900"></span>
                @endif
            </button>

            <button wire:click="setTab('envio')" type="button"
                class="flex-1 min-w-[100px] flex items-center justify-center gap-2 px-3 sm:px-4 py-4 text-sm font-medium transition-colors relative whitespace-nowrap {{ $activeTab === 'envio' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                    </path>
                </svg>
                <span class="hidden sm:inline">Envio</span>
                @if ($activeTab === 'envio')
                    <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-900"></span>
                @endif
            </button>

            <button wire:click="setTab('notificacoes')" type="button"
                class="flex-1 min-w-[100px] flex items-center justify-center gap-2 px-3 sm:px-4 py-4 text-sm font-medium transition-colors relative whitespace-nowrap {{ $activeTab === 'notificacoes' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
                <span class="hidden sm:inline">Notificações</span>
                @if ($activeTab === 'notificacoes')
                    <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-900"></span>
                @endif
            </button>

            <button wire:click="setTab('aparencia')" type="button"
                class="flex-1 min-w-[100px] flex items-center justify-center gap-2 px-3 sm:px-4 py-4 text-sm font-medium transition-colors relative whitespace-nowrap {{ $activeTab === 'aparencia' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                    </path>
                </svg>
                <span class="hidden sm:inline">Aparência</span>
                @if ($activeTab === 'aparencia')
                    <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-900"></span>
                @endif
            </button>

            <button wire:click="setTab('usuarios')" type="button"
                class="flex-1 min-w-[100px] flex items-center justify-center gap-2 px-3 sm:px-4 py-4 text-sm font-medium transition-colors relative whitespace-nowrap {{ $activeTab === 'usuarios' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                <span class="hidden sm:inline">Usuários</span>
                @if ($activeTab === 'usuarios')
                    <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-900"></span>
                @endif
            </button>
        </nav>
    </div>

    <form wire:submit="save">
        <!-- Aba Loja -->
        @if ($activeTab === 'loja')
            <!-- Informações da Loja -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Informações da Loja</h2>

                <div class="space-y-5">
                    <div>
                        <label for="storeName" class="block text-xs font-medium text-gray-500 mb-1.5">Nome da
                            Loja</label>
                        <input wire:model="storeName" type="text" id="storeName"
                            class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm">
                    </div>

                    <div>
                        <label for="storeDescription"
                            class="block text-xs font-medium text-gray-500 mb-1.5">Descrição</label>
                        <textarea wire:model="storeDescription" rows="2" id="storeDescription"
                            class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm resize-none"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="storeEmail" class="block text-xs font-medium text-gray-500 mb-1.5">Email de
                                Contato</label>
                            <input wire:model="storeEmail" type="email" id="storeEmail"
                                class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm">
                        </div>

                        <div>
                            <label for="storePhone"
                                class="block text-xs font-medium text-gray-500 mb-1.5">Telefone</label>
                            <input wire:model="storePhone" type="text" id="storePhone"
                                class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="storeAddress"
                            class="block text-xs font-medium text-gray-500 mb-1.5">Endereço</label>
                        <input wire:model="storeAddress" type="text" id="storeAddress"
                            class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm">
                    </div>
                </div>
            </div>

            <!-- Configurações Gerais -->
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Configurações Gerais</h2>

                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="text-sm font-medium text-gray-900">Manutenção</p>
                        <p class="text-xs text-gray-500">Colocar a loja em modo manutenção</p>
                    </div>
                    <label for="maintenanceMode" class="relative inline-flex items-center cursor-pointer">
                        <input wire:model="maintenanceMode" type="checkbox" id="maintenanceMode"
                            class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                        </div>
                    </label>
                </div>
            </div>
        @endif

        <!-- Aba Pagamento -->
        @if ($activeTab === 'pagamento')
            <!-- Métodos de Pagamento -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Métodos de Pagamento</h2>

                <div class="space-y-1">
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Cartão de Crédito</p>
                            <p class="text-xs text-gray-500">Aceitar pagamentos com cartão</p>
                        </div>
                        <label for="creditCardEnabled" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="creditCardEnabled" type="checkbox" id="creditCardEnabled"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Boleto Bancário</p>
                            <p class="text-xs text-gray-500">Aceitar pagamentos via boleto</p>
                        </div>
                        <label for="boletoEnabled" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="boletoEnabled" type="checkbox" id="boletoEnabled"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3">
                        <div>
                            <p class="text-sm font-medium text-gray-900">PIX</p>
                            <p class="text-xs text-gray-500">Aceitar pagamentos via PIX</p>
                        </div>
                        <label for="pixEnabled" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="pixEnabled" type="checkbox" id="pixEnabled" class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Gateway de Pagamento -->
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Gateway de Pagamento</h2>

                <div class="space-y-5">
                    <div>
                        <label for="paymentGateway"
                            class="block text-xs font-medium text-gray-500 mb-1.5">Provedor</label>
                        <select wire:model="paymentGateway" id="paymentGateway"
                            class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm appearance-none cursor-pointer">
                            <option value="stripe">Stripe</option>
                            <option value="pagarme">Pagar.me</option>
                            <option value="mercadopago">Mercado Pago</option>
                            <option value="pagseguro">PagSeguro</option>
                        </select>
                    </div>

                    <div>
                        <label for="apiKey" class="block text-xs font-medium text-gray-500 mb-1.5">Chave API</label>
                        <input wire:model="apiKey" type="text" id="apiKey"
                            class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm">
                    </div>
                </div>
            </div>

            <!-- Botão Salvar -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Salvar Alterações
                </button>
            </div>
        @endif

        <!-- Aba Envio -->
        @if ($activeTab === 'envio')
            <!-- Métodos de Envio -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Métodos de Envio</h2>

                <div class="space-y-1">
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Correios (PAC)</p>
                            <p class="text-xs text-gray-500">Prazo: 8-12 dias úteis</p>
                        </div>
                        <label for="correiosPacEnabled" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="correiosPacEnabled" type="checkbox" id="correiosPacEnabled"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Correios (SEDEX)</p>
                            <p class="text-xs text-gray-500">Prazo: 2-5 dias úteis</p>
                        </div>
                        <label for="correiosSedexEnabled" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="correiosSedexEnabled" type="checkbox" id="correiosSedexEnabled"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Entrega Expresso</p>
                            <p class="text-xs text-gray-500">Prazo: 1-2 dias úteis</p>
                        </div>
                        <label for="entregaExpressoEnabled" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="entregaExpressoEnabled" type="checkbox" id="entregaExpressoEnabled"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Retirada na Loja</p>
                            <p class="text-xs text-gray-500">Grátis</p>
                        </div>
                        <label for="retiradaLojaEnabled" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="retiradaLojaEnabled" type="checkbox" id="retiradaLojaEnabled"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Configurações de Frete -->
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Configurações de Frete</h2>

                <div class="space-y-5">
                    <div>
                        <label for="freeShippingMinimum" class="block text-xs font-medium text-gray-500 mb-1.5">Frete
                            Grátis acima de</label>
                        <input wire:model="freeShippingMinimum" type="text" id="freeShippingMinimum"
                            class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm">
                    </div>

                    <div>
                        <label for="originZipCode" class="block text-xs font-medium text-gray-500 mb-1.5">CEP de
                            Origem</label>
                        <input wire:model="originZipCode" type="text" id="originZipCode"
                            class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm">
                    </div>
                </div>
            </div>

            <!-- Botão Salvar -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Salvar Alterações
                </button>
            </div>
        @endif

        <!-- Aba Notificações -->
        @if ($activeTab === 'notificacoes')
            <!-- Notificações para Admin -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Notificações para Admin</h2>

                <div class="space-y-1">
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Novos Pedidos</p>
                            <p class="text-xs text-gray-500">Receber notificação de novos pedidos</p>
                        </div>
                        <label for="notifyNewOrders" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="notifyNewOrders" type="checkbox" id="notifyNewOrders"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Estoque Baixo</p>
                            <p class="text-xs text-gray-500">Alertas quando produtos estiverem acabando</p>
                        </div>
                        <label for="notifyLowStock" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="notifyLowStock" type="checkbox" id="notifyLowStock"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Novos Clientes</p>
                            <p class="text-xs text-gray-500">Notificar sobre novos cadastros</p>
                        </div>
                        <label for="notifyNewCustomers" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="notifyNewCustomers" type="checkbox" id="notifyNewCustomers"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Notificações para Clientes -->
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Notificações para Clientes</h2>

                <div class="space-y-1">
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Confirmação de Pedido</p>
                            <p class="text-xs text-gray-500">Email ao confirmar pedido</p>
                        </div>
                        <label for="notifyOrderConfirmation" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="notifyOrderConfirmation" type="checkbox" id="notifyOrderConfirmation"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Atualização de Status</p>
                            <p class="text-xs text-gray-500">Email quando status do pedido mudar</p>
                        </div>
                        <label for="notifyStatusUpdate" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="notifyStatusUpdate" type="checkbox" id="notifyStatusUpdate"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-3">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Newsletter</p>
                            <p class="text-xs text-gray-500">Permitir envio de newsletter promocional</p>
                        </div>
                        <label for="notifyNewsletter" class="relative inline-flex items-center cursor-pointer">
                            <input wire:model="notifyNewsletter" type="checkbox" id="notifyNewsletter"
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-900">
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Botão Salvar -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Salvar Alterações
                </button>
            </div>
        @endif

        <!-- Aba Aparência -->
        @if ($activeTab === 'aparencia')
            <!-- Tema da Loja -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Tema da Loja</h2>

                <div class="space-y-5">
                    <div>
                        <label for="colorScheme" class="block text-xs font-medium text-gray-500 mb-1.5">Esquema de
                            Cores</label>
                        <select wire:model="colorScheme" id="colorScheme"
                            class="w-full px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm appearance-none cursor-pointer">
                            <option value="claro">Claro</option>
                            <option value="escuro">Escuro</option>
                            <option value="auto">Automático (Sistema)</option>
                        </select>
                    </div>

                    <div>
                        <label for="primaryColor" class="block text-xs font-medium text-gray-500 mb-1.5">Cor
                            Primária</label>
                        <div class="flex items-center gap-3">
                            <input wire:model="primaryColor" type="color" id="primaryColor"
                                class="w-10 h-10 rounded-lg border-0 cursor-pointer p-0">
                            <input wire:model="primaryColor" type="text"
                                class="flex-1 px-4 py-2.5 bg-gray-50 border-0 border-b border-gray-200 focus:outline-none focus:border-gray-900 focus:ring-0 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo e Marca -->
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="text-base font-semibold text-gray-900 mb-6">Logo e Marca</h2>

                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Logo da Loja</label>
                        <div
                            class="border-2 border-dashed border-gray-200 rounded-lg p-8 text-center hover:border-gray-300 transition-colors cursor-pointer">
                            <p class="text-sm text-gray-500">Arraste uma imagem ou clique para fazer upload</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG ou SVG (máx. 2MB)</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Favicon</label>
                        <div
                            class="border-2 border-dashed border-gray-200 rounded-lg p-8 text-center hover:border-gray-300 transition-colors cursor-pointer">
                            <p class="text-sm text-gray-500">Arraste uma imagem ou clique para fazer upload</p>
                            <p class="text-xs text-gray-400 mt-1">ICO ou PNG (32x32px)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botão Salvar -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Salvar Alterações
                </button>
            </div>
        @endif

        <!-- Aba Usuários -->
        @if ($activeTab === 'usuarios')
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-base font-semibold text-gray-900">Usuários Administradores</h2>
                        <p class="text-xs text-gray-500 mt-1">Gerencie os usuários com acesso ao painel administrativo
                        </p>
                    </div>
                    <button wire:click.prevent="openUserModal" type="button"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Adicionar Usuário
                    </button>
                </div>

                <!-- Funções e Permissões -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Funções e Permissões</h3>
                    <div class="space-y-2">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-24">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-900 text-white">
                                    Administrador
                                </span>
                            </div>
                            <p class="text-xs text-gray-600">Acesso total ao sistema. Pode gerenciar usuários,
                                configurações, produtos, pedidos e relatórios.</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-24">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Editor
                                </span>
                            </div>
                            <p class="text-xs text-gray-600">Pode gerenciar produtos, pedidos e clientes. Não pode
                                alterar configurações ou usuários.</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-24">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Visualizador
                                </span>
                            </div>
                            <p class="text-xs text-gray-600">Apenas visualização. Pode ver relatórios e informações,
                                mas não pode fazer alterações.</p>
                        </div>
                    </div>
                </div>

                <!-- Tabela de Usuários -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th
                                    class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nome</th>
                                <th
                                    class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th
                                    class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Função</th>
                                <th
                                    class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Criado em</th>
                                <th
                                    class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs font-medium">
                                                {{ strtoupper(substr($user['name'], 0, 2)) }}
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $user['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-600">{{ $user['email'] }}</td>
                                    <td class="py-4 px-4">
                                        @if ($user['role'] === 'administrador')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-900 text-white">
                                                Administrador
                                            </span>
                                        @elseif ($user['role'] === 'editor')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Editor
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Visualizador
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4">
                                        @if ($user['status'] === 'ativo')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Ativo
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                Inativo
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-600">
                                        {{ date('d/m/Y', strtotime($user['created_at'])) }}</td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center justify-end gap-2">
                                            <button wire:click="openUserModal({{ $user['id'] }})" type="button"
                                                class="p-1.5 text-gray-400 hover:text-gray-600 transition-colors"
                                                title="Editar">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button wire:click="toggleUserStatus({{ $user['id'] }})" type="button"
                                                class="p-1.5 text-gray-400 hover:text-gray-600 transition-colors"
                                                title="{{ $user['status'] === 'ativo' ? 'Desativar' : 'Ativar' }}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button wire:click="confirmDeleteUser({{ $user['id'] }})"
                                                type="button"
                                                class="p-1.5 text-gray-400 hover:text-red-600 transition-colors"
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </form>

    <!-- Modal de Usuário -->
    @if ($showUserModal)
        <div class="fixed inset-0 z-[9999] overflow-y-auto">
            <!-- Overlay -->
            <div class="fixed inset-0 bg-black/50" wire:click="closeUserModal"></div>

            <!-- Modal Container -->
            <div class="fixed inset-0 flex items-center justify-center p-4">
                <!-- Modal -->
                <div class="relative bg-white rounded-xl shadow-xl w-full max-w-md">
                    <div class="px-6 pt-5 pb-6">
                        <div class="flex items-start justify-between mb-1">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $editingUserId ? 'Editar Usuário' : 'Adicionar Novo Usuário' }}
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $editingUserId ? 'Atualize os dados do usuário' : 'Crie um novo usuário com acesso ao painel administrativo' }}
                                </p>
                            </div>
                            <button wire:click="closeUserModal" type="button"
                                class="text-gray-400 hover:text-gray-600 -mt-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="space-y-4 mt-6">
                            <div>
                                <label for="userName"
                                    class="block text-sm font-medium text-gray-900 mb-1.5">Nome</label>
                                <input wire:model="userName" type="text" id="userName"
                                    placeholder="Nome completo"
                                    class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                            </div>

                            <div>
                                <label for="userEmail"
                                    class="block text-sm font-medium text-gray-900 mb-1.5">Email</label>
                                <input wire:model="userEmail" type="email" id="userEmail"
                                    placeholder="email@exemplo.com"
                                    class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                            </div>

                            @if (!$editingUserId)
                                <div>
                                    <label for="userPassword"
                                        class="block text-sm font-medium text-gray-900 mb-1.5">Senha</label>
                                    <input wire:model="userPassword" type="password" id="userPassword"
                                        placeholder="Senha de acesso"
                                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                                </div>
                            @endif

                            <div>
                                <label for="userRole"
                                    class="block text-sm font-medium text-gray-900 mb-1.5">Função</label>
                                <div class="relative">
                                    <select wire:model="userRole" id="userRole"
                                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm appearance-none bg-white">
                                        <option value="administrador">Administrador</option>
                                        <option value="editor">Editor</option>
                                        <option value="visualizador">Visualizador</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 mt-6">
                            <button wire:click="closeUserModal" type="button"
                                class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                Cancelar
                            </button>
                            <button wire:click="saveUser" type="button"
                                class="px-4 py-2.5 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition-colors">
                                {{ $editingUserId ? 'Atualizar' : 'Adicionar' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal de Confirmação de Exclusão -->
    @if ($showDeleteUserModal)
        <div class="fixed inset-0 z-[9999] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/50" wire:click="$set('showDeleteUserModal', false)"></div>
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
                            <h3 class="text-lg font-semibold text-gray-900">Excluir Usuário</h3>
                            <p class="text-sm text-gray-500 mt-1">Tem certeza que deseja remover este usuário? Esta
                                ação não pode ser desfeita.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 rounded-b-xl">
                    <button wire:click="$set('showDeleteUserModal', false)"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancelar
                    </button>
                    <button wire:click="deleteUser"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition-colors">
                        Excluir
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
