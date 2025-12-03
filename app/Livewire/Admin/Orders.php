<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Orders extends Component
{
    public string $search = '';

    public string $statusFilter = '';

    public bool $showDetailsModal = false;

    public ?array $selectedOrder = null;

    public function getOrdersProperty(): array
    {
        $orders = [
            [
                'id' => 'ORD-001',
                'customer' => 'Carlos Silva',
                'email' => 'carlos@email.com',
                'phone' => '(11) 99999-1234',
                'total' => 249.80,
                'status' => 'Entregue',
                'date' => '15/01/2024, 10:30:00',
                'payment' => 'Cartão de Crédito',
                'items' => [
                    ['name' => 'Camiseta Essential Branca', 'qty' => 2, 'price' => 79.90],
                    ['name' => 'Camiseta Oversized Preta', 'qty' => 1, 'price' => 99.90],
                ],
                'address' => 'Rua das Flores, 123 - São Paulo, SP',
            ],
            [
                'id' => 'ORD-002',
                'customer' => 'Ana Santos',
                'email' => 'ana@email.com',
                'phone' => '(11) 98888-5678',
                'total' => 159.80,
                'status' => 'Enviado',
                'date' => '15/01/2024, 14:20:00',
                'payment' => 'PIX',
                'items' => [
                    ['name' => 'Camiseta Sand Bege', 'qty' => 2, 'price' => 79.90],
                ],
                'address' => 'Av. Brasil, 456 - Rio de Janeiro, RJ',
            ],
            [
                'id' => 'ORD-003',
                'customer' => 'Pedro Oliveira',
                'email' => 'pedro@email.com',
                'phone' => '(21) 97777-9012',
                'total' => 329.70,
                'status' => 'Processando',
                'date' => '14/01/2024, 09:15:00',
                'payment' => 'Boleto',
                'items' => [
                    ['name' => 'Camiseta Navy Premium', 'qty' => 2, 'price' => 89.90],
                    ['name' => 'Camiseta Slim Fit Verde', 'qty' => 1, 'price' => 84.90],
                    ['name' => 'Camiseta Básica Cinza', 'qty' => 1, 'price' => 69.90],
                ],
                'address' => 'Rua do Comércio, 789 - Belo Horizonte, MG',
            ],
            [
                'id' => 'ORD-004',
                'customer' => 'Maria Costa',
                'email' => 'maria@email.com',
                'phone' => '(31) 96666-3456',
                'total' => 149.80,
                'status' => 'Pendente',
                'date' => '14/01/2024, 16:45:00',
                'payment' => 'PIX',
                'items' => [
                    ['name' => 'Camiseta Feminina Rosa', 'qty' => 2, 'price' => 74.90],
                ],
                'address' => 'Rua das Palmeiras, 321 - Curitiba, PR',
            ],
        ];

        if ($this->search) {
            $search = strtolower($this->search);
            $orders = array_filter($orders, fn ($o) => str_contains(strtolower($o['customer']), $search) ||
                str_contains(strtolower($o['id']), $search)
            );
        }

        if ($this->statusFilter) {
            $orders = array_filter($orders, fn ($o) => $o['status'] === $this->statusFilter);
        }

        return array_values($orders);
    }

    public function getStatusCountsProperty(): array
    {
        $orders = $this->orders;

        return [
            'Pendente' => count(array_filter($orders, fn ($o) => $o['status'] === 'Pendente')),
            'Processando' => count(array_filter($orders, fn ($o) => $o['status'] === 'Processando')),
            'Enviado' => count(array_filter($orders, fn ($o) => $o['status'] === 'Enviado')),
            'Entregue' => count(array_filter($orders, fn ($o) => $o['status'] === 'Entregue')),
        ];
    }

    public function viewDetails(string $orderId)
    {
        $this->selectedOrder = collect($this->orders)->firstWhere('id', $orderId);
        $this->showDetailsModal = true;
    }

    public function markAsDelivered(string $orderId)
    {
        $this->dispatch('toast', message: 'Pedido marcado como entregue!', type: 'success');
    }

    public function render()
    {
        return view('livewire.admin.orders', [
            'orders' => $this->orders,
            'statusCounts' => $this->statusCounts,
        ]);
    }
}
