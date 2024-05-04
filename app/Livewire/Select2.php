<?php

namespace App\Livewire;

use Livewire\Component;

class Select2 extends Component
{
    public $userId;

    public function render()
    {
        return view('livewire.select2')
                ->extends('layouts.app')
                ->section('content');;
    }
}
