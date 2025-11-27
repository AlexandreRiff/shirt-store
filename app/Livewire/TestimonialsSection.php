<?php

namespace App\Livewire;

use Livewire\Component;

class TestimonialsSection extends Component
{
    public array $testimonials = [];

    public function render()
    {
        return view('livewire.testimonials-section');
    }
}
