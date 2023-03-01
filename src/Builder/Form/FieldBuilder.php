<?php

namespace OEngine\Admin\Builder\Form;

use OEngine\Platform\HtmlBuilder;

class FieldBuilder extends HtmlBuilder
{
    private $type;
    protected function render()
    {
        $type = $this->type ?? 'text';
        echo  viewt('admin::builder.field.' . $type)->render();
    }
}
