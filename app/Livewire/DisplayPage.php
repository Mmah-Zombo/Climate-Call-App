<?php

namespace App\Livewire;

use App\Models\Search;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayPage extends Component
{
    public function render()
    {

        return view('livewire.display-page');
    }

    public function store(Request $request) {
        $request->validate(['location' => 'required|string|max:255']);
        $request->user()->searches()->create([
            'location' => $request->location
        ]);

        
        return redirect()->route('display');
        // return back()->with('error', 'please input a search query');
        // return view('livewire.display-page');
    }
}


