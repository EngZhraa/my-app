<?php

namespace App\Http\Livewire;

use Livewire\Component;


class FinDetail extends Component
{

    public $Fdet;

    public function mount(Fdet $Fdet)
    {
        $this->Fdet = $Fdet;
    }

    public function render()
    {
        return view('livewire.fin_detail');
    }
}
