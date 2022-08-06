<?php

namespace App\Http\Livewire\Avatar;

use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $avatar;

    protected $rules = [
        'avatar' => 'required|image|max:1024',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit()
    {
        $this->validate();

        dd($this->avatar);
    }

    public function render()
    {
        return view('livewire.avatar.edit');
    }
}
