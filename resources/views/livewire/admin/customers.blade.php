<div>
    <x-slot name="header">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Clientes</h1>
            <p class="text-sm text-gray-500 hidden sm:block">Gerencie seus {{ count($customers) }} clientes</p>
        </div>
    </x-slot>

    <!-- Search -->
    <div class="mb-6">
        <div class="relative max-w-md">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Buscar clientes..."
                class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
    </div>

    <!-- Customers Table -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="border-b border-gray-200">
                    <tr>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Cliente</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Contato</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Pedidos</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Total Gasto</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Último Pedido</th>
                        <th class="text-left px-6 py-4 text-sm font-medium text-gray-500">Status</th>
                        <th class="text-right px-6 py-4 text-sm font-medium text-gray-500">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($customers as $customer)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $customer['name'] }}</p>
                                    <p class="text-sm text-gray-500">Desde {{ $customer['created_at'] }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $customer['email'] }}
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                        {{ $customer['phone'] }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-900">{{ $customer['orders'] }}</td>
                            <td class="px-6 py-4 text-gray-900">R$
                                {{ number_format($customer['total_spent'], 2, ',', '.') }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $customer['last_order'] }}</td>
                            <td class="px-6 py-4">
                                @if ($customer['status'] === 'Ativo')
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-900 text-white">
                                        {{ $customer['status'] }}
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                        {{ $customer['status'] }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-sm text-gray-600 hover:text-gray-900">Ver Detalhes</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-1">Nenhum cliente encontrado</h3>
                                <p class="text-gray-500">Tente buscar por outro termo.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
