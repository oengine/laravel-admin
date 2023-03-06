<?php

namespace OEngine\Admin\Http\Livewire\Table;

use OEngine\Admin\Builder\Common\Field;
use OEngine\Admin\Builder\Common\Form;
use OEngine\Admin\Builder\Common\Manager;
use OEngine\Admin\Builder\Common\Table;
use OEngine\Platform\Models\User;

class UserManager extends Manager
{
    public function getKey()
    {
        return 'user';
    }
    public function getFields()
    {
        return [
            Field::Create('name')
        ];
    }
    public function getModel()
    {
        return User::class;
    }
    public function getForm()
    {
        return Form::Create();
    }
    public function getTable()
    {
        return Table::Create();
    }
}
