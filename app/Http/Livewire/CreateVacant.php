<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacant;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{

    public $title, $salary, $category, $company, $last_day, $description, $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024'
    ];

    public function createVacant()
    {
        $data = $this->validate();

        // Almacenar la imagen
        $imagePath = $this->image->store('public/vacants');
        $data['image'] = str_replace('public/vacants/', '', $imagePath);

        // Crear la vacante
        Vacant::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => auth()->user()->id
        ]);

        // Crear un mensaje
        session()->flash('mensaje', 'The vacancy was published correctly!');

        // Redireccionar
        return redirect()->route('vacants.index');
    }

    public function render()
    {
        // Consulta a la BD
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacant', compact('salaries', 'categories'));
    }
}
