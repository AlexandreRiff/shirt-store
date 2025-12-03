<div>
    <x-slot name="header">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-sm text-gray-500 hidden sm:block">Visão geral da sua loja</p>
        </div>
    </x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <div class="bg-white rounded-xl border border-gray-200 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm text-gray-500 truncate">Total de Produtos</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">{{ $totalProducts }}</p>
                </div>
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-600 mt-2">{{ $activeProducts }} ativos</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm text-gray-500 truncate">Total de Pedidos</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">{{ $totalOrders }}</p>
                </div>
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-600 mt-2">+12% este mês</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm text-gray-500 truncate">Total de Clientes</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">{{ $totalCustomers }}</p>
                </div>
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-600 mt-2">+8 novos</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm text-gray-500 truncate">Receita Total</p>
                    <p class="text-lg sm:text-2xl font-bold text-gray-900 mt-1">R$
                        {{ number_format($revenue, 0, ',', '.') }}</p>
                </div>
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-yellow-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-600 mt-2">+18% este mês</p>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white rounded-xl border border-gray-200 p-4 sm:p-6 mb-6 sm:mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-base sm:text-lg font-semibold text-gray-900">Pedidos Recentes</h2>
            <a href="{{ route('admin.orders') }}" class="text-sm text-blue-600 hover:text-blue-700">Ver todos</a>
        </div>

        <!-- Mobile Cards -->
        <div class="block sm:hidden space-y-3">
            @foreach ($recentOrders as $order)
                <div class="border border-gray-100 rounded-lg p-3">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-medium text-gray-900">#{{ $order['id'] }}</span>
                        @php
                            $statusColors = [
                                'Entregue' => 'bg-green-100 text-green-800',
                                'Em trânsito' => 'bg-blue-100 text-blue-800',
                                'Processando' => 'bg-yellow-100 text-yellow-800',
                            ];
                        @endphp
                        <span
                            class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $statusColors[$order['status']] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ $order['status'] }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ $order['customer'] }}</span>
                        <span class="text-gray-900 font-medium">R$
                            {{ number_format($order['total'], 2, ',', '.') }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Desktop Table -->
        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <th class="pb-3">Pedido</th>
                        <th class="pb-3">Cliente</th>
                        <th class="pb-3">Total</th>
                        <th class="pb-3">Status</th>
                        <th class="pb-3">Data</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($recentOrders as $order)
                        <tr>
                            <td class="py-3 font-medium text-gray-900">#{{ $order['id'] }}</td>
                            <td class="py-3 text-gray-600">{{ $order['customer'] }}</td>
                            <td class="py-3 text-gray-900">R$ {{ number_format($order['total'], 2, ',', '.') }}</td>
                            <td class="py-3">
                                @php
                                    $statusColors = [
                                        'Entregue' => 'bg-green-100 text-green-800',
                                        'Em trânsito' => 'bg-blue-100 text-blue-800',
                                        'Processando' => 'bg-yellow-100 text-yellow-800',
                                    ];
                                @endphp
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$order['status']] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $order['status'] }}
                                </span>
                            </td>
                            <td class="py-3 text-gray-500">{{ $order['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
