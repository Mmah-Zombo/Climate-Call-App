<?php

namespace App\Livewire;

use App\Models\Search;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $history;
    public function clear() {
        Search::where('user_id', Auth::id())->delete();
        $user = Auth::user();
        $searchHistory = $user->searches()->orderBy('created_at', 'desc')->get();
        $this->history = $searchHistory;
    }

    public function delete($ToDelete) {
        $this->history = $this->history->except($ToDelete);
        Search::find($ToDelete)->delete();
    }

    public function render()
    {
        $user = Auth::user();
        $searchHistory = $user->searches()->orderBy('created_at', 'desc')->get();
        $this->history = $searchHistory;
        return view('livewire.dashboardView');
    }
}
