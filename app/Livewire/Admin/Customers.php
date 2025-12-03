<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Customers extends Component
{
    public string $search = '';

    public function getCustomersProperty(): array
    {
        $customers = [
            [
                'id' => 1,
                'name' => 'João Silva',
                'email' => 'joao.silva@email.com',
                'phone' => '(11) 98765-4321',
                'orders' => 12,
                'total_spent' => 2450.00,
                'last_order' => '19/03/2024',
                'status' => 'Ativo',
                'created_at' => '14/01/2024',
            ],
            [
                'id' => 2,
                'name' => 'Maria Santos',
                'email' => 'maria.santos@email.com',
                'phone' => '(21) 97654-3210',
                'orders' => 8,
                'total_spent' => 1680.00,
                'last_order' => '17/03/2024',
                'status' => 'Ativo',
                'created_at' => '09/02/2024',
            ],
            [
                'id' => 3,
                'name' => 'Pedro Costa',
                'email' => 'pedro.costa@email.com',
                'phone' => '(31) 96543-2109',
                'orders' => 5,
                'total_spent' => 950.00,
                'last_order' => '14/03/2024',
                'status' => 'Ativo',
                'created_at' => '27/02/2024',
            ],
            [
                'id' => 4,
                'name' => 'Ana Oliveira',
                'email' => 'ana.oliveira@email.com',
                'phone' => '(41) 95432-1098',
                'orders' => 15,
                'total_spent' => 3200.00,
                'last_order' => '18/03/2024',
                'status' => 'Ativo',
                'created_at' => '04/12/2023',
            ],
            [
                'id' => 5,
                'name' => 'Carlos Ferreira',
                'email' => 'carlos.f@email.com',
                'phone' => '(51) 94321-0987',
                'orders' => 3,
                'total_spent' => 450.00,
                'last_order' => '10/03/2024',
                'status' => 'Inativo',
                'created_at' => '15/01/2024',
            ],
            [
                'id' => 6,
                'name' => 'Lucia Mendes',
                'email' => 'lucia.mendes@email.com',
                'phone' => '(61) 93210-9876',
                'orders' => 20,
                'total_spent' => 4500.00,
                'last_order' => '20/03/2024',
                'status' => 'Ativo',
                'created_at' => '10/10/2023',
            ],
        ];

        if ($this->search) {
            $search = strtolower($this->search);
            $customers = array_filter($customers, fn ($c) => str_contains(strtolower($c['name']), $search) ||
                str_contains(strtolower($c['email']), $search)
            );
        }

        return array_values($customers);
    }

    public function render()
    {
        return view('livewire.admin.customers', [
            'customers' => $this->customers,
        ]);
    }
}
