<?php

use OEngine\Admin\Builder\Form\FieldBuilder;
use OEngine\Admin\Builder\Form\FormBuilder;
use OEngine\Admin\Builder\Table\TableBuilder;

if (!function_exists('field_builder')) {
    function field_builder($field, $form = null)
    {
        return  FieldBuilder::Create($field, $form)->toHtml();
    }
}
if (!function_exists('form_builder')) {
    function form_builder($fields, $form = null)
    {
        return  FormBuilder::Create($fields, $form)->toHtml();
    }
}
if (!function_exists('table_render')) {
    function table_render($data, $fields, $table, $buttonInTable = [])
    {
        return  TableBuilder::Create($data, $fields, $table, $buttonInTable)->toHtml();
    }
}
