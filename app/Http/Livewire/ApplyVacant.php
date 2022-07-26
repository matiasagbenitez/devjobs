<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use App\Notifications\NewCandidate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacant extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacant;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
    }

    public function apply()
    {
        $data = $this->validate();

        // Almacenar el cv
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);

        // Crear el candidato
        $this->vacant->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv']
        ]);

        // Crear notificación y enviar email
        $this->vacant->recruiter->notify(new NewCandidate($this->vacant->id, $this->vacant->title, auth()->user()->id));

        // Mostrar al usuario un mensaje de OK
        session()->flash('mensaje', 'Your information was sent successfully. Good luck!');
        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.apply-vacant');
    }
}
