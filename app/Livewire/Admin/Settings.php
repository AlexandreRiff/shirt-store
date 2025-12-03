<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Settings extends Component
{
    public string $activeTab = 'loja';

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

    public function setTab($tab)
    {
        $this->activeTab = $tab;
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
