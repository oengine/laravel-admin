<?php

namespace OEngine\Admin\Http\Livewire\Table;

use OEngine\Admin\Builder\Common\Field;
use OEngine\Admin\Traits\WithTableBuilder;
use OEngine\Reojs\Livewire\Component;

class Index extends Component
{
    use WithTableBuilder;
    public function getManager()
    {
        return UserManager::Create();
    }
  
}
