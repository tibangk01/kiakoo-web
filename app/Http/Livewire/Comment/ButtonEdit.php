<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

class ButtonEdit extends Component
{
    protected $listeners = [
        'showModal' => '$refresh',
        'commentUpdated' => 'fresh',
    ];

    public function render()
    {
        return view('livewire.comment.button-edit');
    }

    public function fresh()
    {
        session()->flash('hideModal', true);
        $this->render();
    }

    public function trigerModal()
    {
        if (session('showMoadal'))
            session()->forget('showMoadal');

        session()->flash('showModal', true);

        $this->emit('showModal');
    }
}
