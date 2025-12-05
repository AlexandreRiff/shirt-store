<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Settings extends Component
{
    public string $activeTab = 'loja';

    // Usuários Mockados
    public array $users = [];

    // Modal de Usuário
    public bool $showUserModal = false;

    public ?int $editingUserId = null;

    public string $userName = '';

    public string $userEmail = '';

    public string $userRole = 'editor';

    public string $userStatus = 'ativo';

    public string $userPassword = '';

    // Modal de Exclusão
    public bool $showDeleteUserModal = false;

    public ?int $deletingUserId = null;

    // Informações da Loja
    public string $storeName = 'URBAN THREADS';

    public string $storeDescription = 'Sua loja de moda urbana com as últimas tendências';

    public string $storeEmail = 'contato@urbanthreads.com';

    public string $storePhone = '(11) 99999-9999';

    public string $storeAddress = 'Rua Exemplo, 123 - São Paulo, SP';

    // Configurações Gerais
    public bool $maintenanceMode = false;

    // Métodos de Pagamento
    public bool $creditCardEnabled = true;

    public bool $boletoEnabled = true;

    public bool $pixEnabled = true;

    // Gateway de Pagamento
    public string $paymentGateway = 'stripe';

    public string $apiKey = 'sk_test_...';

    // Métodos de Envio
    public bool $correiosPacEnabled = true;

    public bool $correiosSedexEnabled = true;

    public bool $entregaExpressoEnabled = false;

    public bool $retiradaLojaEnabled = true;

    // Configurações de Frete
    public string $freeShippingMinimum = '200';

    public string $originZipCode = '01310-100';

    // Notificações para Admin
    public bool $notifyNewOrders = true;

    public bool $notifyLowStock = true;

    public bool $notifyNewCustomers = false;

    // Notificações para Clientes
    public bool $notifyOrderConfirmation = true;

    public bool $notifyStatusUpdate = true;

    public bool $notifyNewsletter = true;

    // Tema da Loja
    public string $colorScheme = 'escuro';

    public string $primaryColor = '#a3a5f6';

    public function mount()
    {
        // Dados mockados de usuários
        $this->users = [
            [
                'id' => 1,
                'name' => 'Admin Principal',
                'email' => 'admin@urbanthreads.com',
                'role' => 'administrador',
                'status' => 'ativo',
                'created_at' => '2024-01-01',
            ],
            [
                'id' => 2,
                'name' => 'João Silva',
                'email' => 'joao@urbanthreads.com',
                'role' => 'editor',
                'status' => 'ativo',
                'created_at' => '2024-02-15',
            ],
            [
                'id' => 3,
                'name' => 'Maria Santos',
                'email' => 'maria@urbanthreads.com',
                'role' => 'visualizador',
                'status' => 'inativo',
                'created_at' => '2024-03-10',
            ],
        ];
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function openUserModal($userId = null)
    {
        $this->showUserModal = true;
        $this->editingUserId = $userId;

        if ($userId) {
            $user = collect($this->users)->firstWhere('id', $userId);
            if ($user) {
                $this->userName = $user['name'];
                $this->userEmail = $user['email'];
                $this->userRole = $user['role'];
                $this->userStatus = $user['status'];
            }
        } else {
            $this->resetUserForm();
        }
    }

    public function closeUserModal()
    {
        $this->showUserModal = false;
        $this->resetUserForm();
    }

    public function resetUserForm()
    {
        $this->editingUserId = null;
        $this->userName = '';
        $this->userEmail = '';
        $this->userPassword = '';
        $this->userRole = 'editor';
        $this->userStatus = 'ativo';
    }

    public function saveUser()
    {
        if ($this->editingUserId) {
            // Atualizar usuário existente
            $index = collect($this->users)->search(fn ($u) => $u['id'] === $this->editingUserId);
            if ($index !== false) {
                $this->users[$index]['name'] = $this->userName;
                $this->users[$index]['email'] = $this->userEmail;
                $this->users[$index]['role'] = $this->userRole;
                $this->users[$index]['status'] = $this->userStatus;
            }
            $message = 'Usuário atualizado com sucesso!';
        } else {
            // Adicionar novo usuário
            $this->users[] = [
                'id' => count($this->users) + 1,
                'name' => $this->userName,
                'email' => $this->userEmail,
                'role' => $this->userRole,
                'status' => $this->userStatus,
                'created_at' => date('Y-m-d'),
            ];
            $message = 'Usuário adicionado com sucesso!';
        }

        $this->closeUserModal();
        $this->dispatch('toast', message: $message, type: 'success');
    }

    public function toggleUserStatus($userId)
    {
        $index = collect($this->users)->search(fn ($u) => $u['id'] === $userId);
        if ($index !== false) {
            $this->users[$index]['status'] = $this->users[$index]['status'] === 'ativo' ? 'inativo' : 'ativo';
            $this->dispatch('toast', message: 'Status atualizado!', type: 'success');
        }
    }

    public function confirmDeleteUser($userId)
    {
        $this->deletingUserId = $userId;
        $this->showDeleteUserModal = true;
    }

    public function deleteUser()
    {
        if ($this->deletingUserId) {
            $this->users = collect($this->users)->reject(fn ($u) => $u['id'] === $this->deletingUserId)->values()->toArray();
            $this->dispatch('toast', message: 'Usuário removido com sucesso!', type: 'success');
        }
        $this->showDeleteUserModal = false;
        $this->deletingUserId = null;
    }

    public function save()
    {
        $this->dispatch('toast', message: 'Configurações salvas com sucesso!', type: 'success');
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
