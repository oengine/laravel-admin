<?php

namespace OEngine\Admin\Builder\Table;

use OEngine\Platform\HtmlBuilder;

class TableBuilder extends HtmlBuilder
{
    protected $data;
    protected $fields;
    protected $table;
    protected $buttonInTable;
    public static function Create($data, $fields, $table, $buttonInTable = [])
    {
        return new self($data, $fields, $table, $buttonInTable);
    }
    public function __construct($data, $fields, $table, $buttonInTable)
    {
        $this->data = $data;
        $this->fields = $fields;
        $this->table = $table;
        $this->buttonInTable = $buttonInTable;
    }
    protected  function render()
    {
        echo viewt('admin::builder.table.index', [
            'fields' => $this->fields,
            'data' => $this->data,
            'table' => $this->table,
            'buttonInTable' => $this->buttonInTable
        ])->render();
    }
}
