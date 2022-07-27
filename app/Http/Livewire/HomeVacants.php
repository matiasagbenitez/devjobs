<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class HomeVacants extends Component
{
    public $term, $category, $salary;

    protected $listeners = ['searchTerms' => 'search'];

    public function search($term, $category, $salary)
    {
        $this->term = $term;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        // $vacants = Vacant::all();

        $vacants = Vacant::when($this->term, function($query) {
            $query->where('title', 'LIKE', "%" . $this->term . "%");
        })
        ->when($this->term, function($query) {
            $query->orWhere('company', 'LIKE', "%" . $this->term . "%");
        })
        ->when($this->category, function($query) {
            $query->where('category_id', $this->category);
        })
        ->when($this->salary, function($query) {
            $query->where('salary_id', $this->salary);
        })
        ->get();

        return view('livewire.home-vacants', compact('vacants'));
    }
}
