<?php

namespace OEngine\Admin\Builder\Table;

use OEngine\Platform\HtmlBuilder;

class TableBuilder extends HtmlBuilder
{
    protected $data;
    protected $configs;

    public function __construct($data, $configs)
    {
        $this->data = $data;
        $this->configs = $configs;
    }
    protected  function render()
    {
    }
}
