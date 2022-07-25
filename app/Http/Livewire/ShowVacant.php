<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class ShowVacant extends Component
{
    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('livewire.show-vacant', compact('vacants'));
    }
}
