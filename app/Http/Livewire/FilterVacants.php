<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacants extends Component
{

    public $term, $category, $salary;

    public function readFormData()
    {
        $this->emit('searchTerms', $this->term, $this->category, $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.filter-vacants', compact('salaries', 'categories'));
    }
}
