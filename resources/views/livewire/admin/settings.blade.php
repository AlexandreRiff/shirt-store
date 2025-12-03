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
    </form>
</div>
