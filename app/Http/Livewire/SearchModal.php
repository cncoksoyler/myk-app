<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchModal extends Component
{
    // public function render()
    // {
    //     return view('livewire.search-modal');
    // }

    public $show = false;

    protected $listeners = [
        'show' => 'show'
    ];

    public function show()
    {
        $this->show = true;
        dd($this->show);
    }
}
