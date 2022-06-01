<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $photo;

    public function render()
    {
        return view('livewire.counter');
    }

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $this->photo->store('photos');
    }
}
