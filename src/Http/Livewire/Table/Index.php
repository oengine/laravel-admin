<?php

namespace OEngine\Admin\Http\Livewire\Table;

use OEngine\Admin\Traits\WithTable;
use OEngine\Reojs\Livewire\Component;

class Index extends Component
{
    use WithTable;
    public function getManager()
    {
        return UserManager::Create();
    }
  
}
