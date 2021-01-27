<?php

namespace App\Http\Livewire;

use App\Models\ShortLink;
use Livewire\Component;

class EditLinks extends Component
{
    public $shortLink;

    protected $rules = [
        'shortLink.*.link' => 'required|string',
        'shortLink.*.code' => 'required|string',
    ];

    public function mount($shortLink){
        $this->shortLink = $shortLink;
    }

    public function save() {
        $this->validate();
        foreach($this->shortLink as $shortLink){
            $shortLink->update($shortLink->toArray());
        }
        session()->flash('message', 'Link atualizado com sucesso');
        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.edit-links');
    }
}
