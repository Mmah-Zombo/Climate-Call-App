<?php

namespace App\Livewire;

use App\Models\Search;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ClearHistory extends Component
{
    public function render()
    {
        return view('livewire.clear-history');
    }

    public function clear() {
        Search::where('user_id', Auth::id())->delete();
    }
}
