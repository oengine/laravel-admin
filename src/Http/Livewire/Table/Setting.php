<?php

namespace OEngine\Admin\Http\Livewire\Table;

use OEngine\Admin\Builder\Common\Field;
use OEngine\Reojs\Livewire\Component;

class Setting extends Component
{
    public $fields = [];
    public $table_buttons = [];
    public $form_buttons = [];
    public $table_data = [];
    public function mount($table = '')
    {
    }
    public function doSave()
    {
        $this->showMessage([
            'message' => 'thông tin',
            'title' => 'abc',
            'meta' => [
                'type' => 'text-bg-primary border-0',
                'postion'=>'bottom_left'
            ]
        ]);
        info($this->fields);
    }
    public function doApplySetting()
    {
        info($this->fields);
    }
    public function render()
    {
        return viewt('admin::table.setting', [
            'fieldTypes' => Field::getAllType()
        ]);
    }
}
