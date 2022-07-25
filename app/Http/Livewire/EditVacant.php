<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVacant extends Component
{

    public $vacant_id, $title, $salary, $category, $company, $last_day, $description, $image, $newImage;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'newImage' => 'nullable|image|max:1024'
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacant_id = $vacant->id;
        $this->title = $vacant->title;
        $this->salary = $vacant->salary_id;
        $this->category = $vacant->category_id;
        $this->company = $vacant->company;
        $this->last_day = Carbon::parse($vacant->last_day)->format('Y-m-d');
        $this->description = $vacant->description;
        $this->image = $vacant->image;
    }

    public function editVacant()
    {
        $data = $this->validate();

        // Nueva imagen?
        if ($this->newImage){
            $image = $this->newImage->store('public/vacants');
            $data['image'] = str_replace('public/vacants/', '', $image);
        }

        // Encontrar la vacante a editar
        $vacant = Vacant::find($this->vacant_id);

        // Asignar los valores
        $vacant->title = $data['title'];
        $vacant->salary_id = $data['salary'];
        $vacant->category_id = $data['category'];
        $vacant->company = $data['company'];
        $vacant->last_day = $data['last_day'];
        $vacant->description = $data['description'];
        $vacant->image = $data['image'] ?? $vacant->image;

        // Guardar la vacante
        $vacant->save();

        // Redireccionar
        session()->flash('mensaje', 'The vacancy was updated succesfully!');
        return redirect()->route('vacants.index');

    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacant', compact('salaries', 'categories'));
    }
}
