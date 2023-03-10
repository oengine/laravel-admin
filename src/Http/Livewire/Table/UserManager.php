<?php

namespace OEngine\Admin\Http\Livewire\Table;

use OEngine\Admin\Builder\Common\Button;
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
            Field::Create('name')->Title('name'),
            Field::Create('email'),
            Field::Create('status'),
            Field::Create('info'),
            Field::Create('created_at'),
            Field::Create('updated_at')
        ];
    }
    public function getModel()
    {
        return User::class;
    }
    public function getForm()
    {
        return Form::Create()->Title('Thông tin người dùng');
    }
    public function getTable()
    {
        return Table::Create()->enableFirstCheckbox()->Title('Thông tin người dùng')->Button([
            Button::Create('Thêm mới')->Route('admin.table.add', ['table' => 'user']),
            Button::Create('Sửa')->InTable()->Route('admin.table.edit', ['table' => 'user','id'=>123]),
            Button::Create('Xoá')->InTable(),
            Button::Create('Xoá')->InTable(),
            Button::Create('Xoá')->InTable(),
        ]);
    }
}
