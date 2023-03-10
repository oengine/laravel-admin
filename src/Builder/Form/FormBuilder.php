<?php

namespace OEngine\Admin\Builder\Form;

use OEngine\Admin\Builder\Common\Form;
use OEngine\Platform\HtmlBuilder;

class FormBuilder extends HtmlBuilder
{
    public static function Create($fields, $form)
    {
        return new self($fields, $form);
    }

    private $fields;
    protected Form $form;
    public function __construct($fields, $form)
    {
        $this->fields = $fields;
        $this->form = $form;
    }
    protected function render()
    {
        if ($layout = $this->form->getLayout()) {
            echo  viewt('admin::builder.form.layout', [
                'fields' => $this->fields,
                'form' => $this->form,
                'layout' => $layout
            ])->render();
        } else {
            echo  viewt('admin::builder.form.index', [
                'fields' => $this->fields, 'form' => $this->form
            ])->render();
        }
    }
}
