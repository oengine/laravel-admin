<?php

namespace OEngine\Admin\Builder\Form;

use OEngine\Admin\Builder\Common\Field;
use OEngine\Platform\HtmlBuilder;

class FieldBuilder extends HtmlBuilder
{
    private Field $field;
    protected function render()
    {
        if ($this->field) {
            echo  viewt('admin::builder.field.' .$this->field->getFieldType())->render();
        } else {
            echo  viewt('admin::builder.field.' . Field::Default())->render();
        }
    }
}
