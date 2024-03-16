<?php

namespace App\Livewire;

use Livewire\Component;

class CreateButton extends Component
{
    public function render()
    {
        return view('livewire.create-button');
    }

    public function create()
    {
        return redirect()->route('products.create');
    }
}
