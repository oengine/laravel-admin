<?php

namespace OEngine\Admin\Http\Livewire\Table;

use OEngine\Admin\Traits\WithForm;
use OEngine\Reojs\Livewire\Component;

class Edit extends Component
{
    use WithForm;
    public function getManager()
    {
        return UserManager::Create();
    }
}
