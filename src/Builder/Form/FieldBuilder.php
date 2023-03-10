<?php

namespace OEngine\Admin\Builder\Form;

use OEngine\Admin\Builder\Common\Field;
use OEngine\Platform\HtmlBuilder;

class FieldBuilder extends HtmlBuilder
{
    public static function Create($field, $form)
    {
        return new self($field, $form);
    }

    private Field $field;
    private $form;
    public function __construct($field, $form)
    {
        $this->field = $field;
        $this->form = $form;
    }
    protected function render()
    {
        $fieldType = Field::Default();
        if ($this->field) {
            $fieldType = $this->field->getFieldType();
        }
        if (!str_contains('::', $fieldType)) {
            $fieldType =   'admin::builder.field.' . $fieldType;
        }
        echo  viewt($fieldType, ['field' => $this->field, 'form' => $this->form])->render();
    }
}
