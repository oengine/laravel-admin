<?php

namespace OEngine\Admin\Http\Livewire;

use OEngine\Reojs\Livewire\Component;

class Test extends Component
{
    public $count = 0;
    public function Tang()
    {
        $this->count++;
    }
    public function render()
    {
        return view('admin::test');
    }
}
