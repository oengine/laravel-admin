<?php

namespace OEngine\Admin\Http\Livewire\Table;

use OEngine\Admin\Builder\Common\Field;
use OEngine\Admin\Message;
use OEngine\Reojs\Livewire\Component;

class Setting extends Component
{
    public $fields = [];
    public $table_buttons = [];
    public $form_buttons = [];
    public $table_data=[
        'model_name'=>'',
        'table_name'=>'',
        'table_key'=>'',
        'table_button_edit'=>'',
        'table_button_remove'=>'',
        'table_check_row'=>'',
        'model_name'=>'',
        'model_name'=>''
    ];
    public function mount($table = '')
    {
    }
    public function doSave()
    {
        $this->showMessage([
            'message' => json_encode($this->table_data),
            'title' => 'abc',
            'meta' => [
              //  'type' => 'text-bg-primary border-0',
             //  'postion'=>Message::bottom_center
            ]
        ]);
        info($this->table_data);
    }
    public function doApplySetting()
    {
        info($this->fields);
    }
    public function render()
    {
        return viewt('admin::table.setting', [
            'fieldTypes' => Field::getAllType(),
            'buttonTypes'=>[
                'link',
                'route',
                'action'
            ]
        ]);
    }
}
