<?php

namespace App\Livewire;

use App\Http\Controllers\DashboardController;
use App\Models\Search;
use Livewire\Component;

class DeleteSearch extends Component
{
    public $listeners = ['delete'];
    public $searchToDelete;

    public function delete() {
        Search::find($this->searchToDelete)->delete();
    }
    public function render()
    {
        return view('livewire.delete-search');
    }
}
