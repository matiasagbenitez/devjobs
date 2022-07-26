<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowVacancy extends Component
{
    public $vacant;

    public function render()
    {
        return view('livewire.show-vacancy');
    }
}
