<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class DisplayPage extends Component
{
    public $loca;
    public function render()
    {
        return view('livewire.display-page');
    }

    public function store(Request $request) {
        $request->validate(['location' => 'required|string|max:255']);
        $request->user()->searches()->create([
            'location' => $request->location
        ]);
        $this->loca = $request->location;
        return view('livewire.display-page', ['loca' => $this->loca]);
    }
    
}
