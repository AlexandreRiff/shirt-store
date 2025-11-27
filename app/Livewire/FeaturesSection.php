<?php

namespace App\Livewire;

use Livewire\Component;

class FeaturesSection extends Component
{
    public array $features = [];

    public function render()
    {
        return view('livewire.features-section');
    }
}
