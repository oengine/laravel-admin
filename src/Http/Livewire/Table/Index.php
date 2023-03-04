<?php

namespace OEngine\Admin\Http\Livewire\Table;

use OEngine\Admin\Traits\WithTableBuilder;
use OEngine\Reojs\Livewire\Component;

class Index extends Component
{
    use WithTableBuilder;
    public function render()
    {
        return viewt('admin::table.index');
    }
}
