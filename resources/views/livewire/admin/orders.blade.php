<div>
    <x-slot name="header">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Pedidos</h1>
            <p class="text-sm text-gray-500 hidden sm:block">Gerencie seus {{ count($orders) }} pedidos</p>
        </div>
    </x-slot>

    <!-- Search, Filters and Status Summary -->
    <div class="flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4 mb-6">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
            <div class="relative flex-1 sm:w-64">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Buscar pedidos..."
                    class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <select wire:model.live="statusFilter"
                class="w-full sm:w-48 px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Todos os Status</option>
                <option value="Pendente">Pendente</option>
                <option value="Processando">Processando</option>
                <option value="Enviado">Enviado</option>
                <option value="Entregue">Entregue</option>
            </select>
        </div>

        <div class="flex items-center gap-4 text-sm">
            <span class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                {{ $statusCounts['Pendente'] }} Pendentes
            </span>
            <span class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                {{ $statusCounts['Processando'] }} Processando
            </span>
            <span class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                {{ $statusCounts['Enviado'] }} Enviados
            </span>
        </div>
    </div>

    <!-- Orders List -->
    <div class="space-y-4">
        @forelse($orders as $order)
            @php
                $statusColors = [
                    'Entregue' => 'bg-green-100 text-green-700',
                    'Enviado' => 'bg-purple-100 text-purple-700',
                    'Processando' => 'bg-blue-100 text-blue-700',
                    'Pendente' => 'bg-yellow-100 text-yellow-700',
                    'Cancelado' => 'bg-red-100 text-red-700',
                ];
            @endphp
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
                    <!-- Order Info -->
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="font-bold text-gray-900 text-lg">{{ $order['id'] }}</span>
                            <span
                                class="px-2.5 py-1 text-xs font-medium rounded-full {{ $statusColors[$order['status']] ?? 'bg-gray-100 text-gray-700' }}">
                                {{ $order['status'] }}
                            </span>
                        </div>

                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium text-gray-700">Cliente:</span> {{ $order['customer'] }}</p>
                            <p><span class="font-medium text-gray-700">E-mail:</span> {{ $order['email'] }}</p>
                            <p><span class="font-medium text-gray-700">Data:</span> {{ $order['date'] }}</p>
                            <p><span class="font-medium text-gray-700">Pagamento:</span> {{ $order['payment'] }}</p>
                        </div>

                        <!-- Items -->
                        <div class="mt-4">
                            <p class="text-sm font-medium text-gray-700 mb-2">Itens ({{ count($order['items']) }}):</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($order['items'] as $item)
                                    <span class="px-3 py-1.5 bg-gray-100 rounded-lg text-sm text-gray-700">
                                        {{ $item['qty'] }}x {{ $item['name'] }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Action Button -->
                        @if ($order['status'] === 'Enviado')
                            <button wire:click="markAsDelivered('{{ $order['id'] }}')"
                                class="mt-4 flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Marcar como Entregue
                            </button>
                        @endif
                    </div>

                    <!-- Total and Actions -->
                    <div
                        class="flex flex-row lg:flex-col items-center lg:items-end justify-between lg:justify-start gap-4">
                        <span class="text-2xl font-bold text-gray-900">R$
                            {{ number_format($order['total'], 2, ',', '.') }}</span>
                        <button wire:click="viewDetails('{{ $order['id'] }}')"
                            class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            Ver Detalhes
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl border border-gray-200 p-12 text-center">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-1">Nenhum pedido encontrado</h3>
                <p class="text-gray-500">Tente buscar por outro termo ou filtro.</p>
            </div>
        @endforelse
    </div>


    <!-- Details Modal -->
    @if ($showDetailsModal && $selectedOrder)
        <div class="fixed inset-0 z-[9999] overflow-hidden">
            <div class="fixed inset-0 bg-black/50" wire:click="$set('showDetailsModal', false)"></div>
            <div class="fixed inset-0 flex items-center justify-center p-4 pointer-events-none">
                <div
                    class="relative bg-white rounded-xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto pointer-events-auto">
                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Pedido {{ $selectedOrder['id'] }}</h3>
                            <p class="text-sm text-gray-500">{{ $selectedOrder['date'] }}</p>
                        </div>
                        @php
                            $statusColors = [
                                'Entregue' => 'bg-green-100 text-green-700',
                                'Enviado' => 'bg-purple-100 text-purple-700',
                                'Processando' => 'bg-blue-100 text-blue-700',
                                'Pendente' => 'bg-yellow-100 text-yellow-700',
                            ];
                        @endphp
                        <span
                            class="px-3 py-1 text-sm font-medium rounded-full {{ $statusColors[$selectedOrder['status']] ?? 'bg-gray-100 text-gray-700' }}">
                            {{ $selectedOrder['status'] }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="px-6 py-4 space-y-6">
                        <!-- Customer Info -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Informações do Cliente</h4>
                            <div class="bg-gray-50 rounded-lg p-4 space-y-2 text-sm">
                                <p><span class="text-gray-500">Nome:</span> <span
                                        class="font-medium">{{ $selectedOrder['customer'] }}</span></p>
                                <p><span class="text-gray-500">E-mail:</span> <span
                                        class="font-medium">{{ $selectedOrder['email'] }}</span></p>
                                <p><span class="text-gray-500">Telefone:</span> <span
                                        class="font-medium">{{ $selectedOrder['phone'] }}</span></p>
                                <p><span class="text-gray-500">Endereço:</span> <span
                                        class="font-medium">{{ $selectedOrder['address'] }}</span></p>
                            </div>
                        </div>

                        <!-- Items -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Itens do Pedido</h4>
                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <table class="w-full text-sm">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="text-left px-4 py-2 font-medium text-gray-600">Produto</th>
                                            <th class="text-center px-4 py-2 font-medium text-gray-600">Qtd</th>
                                            <th class="text-right px-4 py-2 font-medium text-gray-600">Preço</th>
                                            <th class="text-right px-4 py-2 font-medium text-gray-600">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach ($selectedOrder['items'] as $item)
                                            <tr>
                                                <td class="px-4 py-3">{{ $item['name'] }}</td>
                                                <td class="px-4 py-3 text-center">{{ $item['qty'] }}</td>
                                                <td class="px-4 py-3 text-right">R$
                                                    {{ number_format($item['price'], 2, ',', '.') }}</td>
                                                <td class="px-4 py-3 text-right font-medium">R$
                                                    {{ number_format($item['price'] * $item['qty'], 2, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="bg-gray-50">
                                        <tr>
                                            <td colspan="3" class="px-4 py-3 text-right font-semibold">Total:</td>
                                            <td class="px-4 py-3 text-right font-bold text-lg">R$
                                                {{ number_format($selectedOrder['total'], 2, ',', '.') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <!-- Payment -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Pagamento</h4>
                            <div class="bg-gray-50 rounded-lg p-4 text-sm">
                                <p><span class="text-gray-500">Método:</span> <span
                                        class="font-medium">{{ $selectedOrder['payment'] }}</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
                        <button wire:click="$set('showDetailsModal', false)"
                            class="px-4 py-2 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800">
                            Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
