<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalProducts' => 8,
            'activeProducts' => 7,
            'totalCustomers' => 156,
            'totalOrders' => 42,
            'revenue' => 12580.90,
            'recentOrders' => [
                ['id' => 1042, 'customer' => 'João Silva', 'total' => 179.80, 'status' => 'Entregue', 'date' => '28/11/2025'],
                ['id' => 1041, 'customer' => 'Maria Santos', 'total' => 99.90, 'status' => 'Em trânsito', 'date' => '27/11/2025'],
                ['id' => 1040, 'customer' => 'Pedro Costa', 'total' => 259.70, 'status' => 'Processando', 'date' => '27/11/2025'],
                ['id' => 1039, 'customer' => 'Ana Oliveira', 'total' => 149.80, 'status' => 'Entregue', 'date' => '26/11/2025'],
            ],
        ]);
    }
}
