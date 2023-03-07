<?php

namespace OEngine\Admin\Builder\Common;

use Illuminate\Database\Eloquent\Model;

class Field
{
    private static $default = self::TEXT;
    public static function SwitchDefault($default)
    {
        self::$default = $default;
    }
    public static function Default()
    {
        return self::$default;
    }
    public static function Create($fieldName = ''): self
    {
        return new self($fieldName);
    }
    protected function __construct($fieldName)
    {
        $this->FieldName($fieldName);
    }
    public const TEXT = 'text';
    public const NUMBER = 'number';
    public const DATE = 'date';
    public const DATETIME = 'datetime';

    private $fieldName;
    public function getFieldName()
    {
        return $this->fieldName;
    }
    public function FieldName($fieldName): self
    {
        $this->fieldName = $fieldName;
        if (!$this->title)  $this->Title($fieldName);
        return $this;
    }
    public function getValue($row)
    {
        if (is_a($row, Model::class)) {
            return $row->{$this->getFieldName()};
        }
    }

    private $fieldType = self::TEXT;
    public function getFieldType()
    {
        return $this->fieldType;
    }
    public function FieldType($fieldType): self
    {
        $this->fieldType = $fieldType;
        return $this;
    }

    private $title = '';
    public function getTitle()
    {
        return $this->title;
    }
    public function Title($title): self
    {
        $this->title = $title;
        if (!$this->tableTitle) $this->TableTitle($title);
        if (!$this->formTitle) $this->FormTitle($title);
        return $this;
    }
    private $tableTitle = '';
    public function getTableTitle()
    {
        return $this->tableTitle;
    }
    public function TableTitle($title): self
    {
        $this->tableTitle = $title;
        return $this;
    }
    private $formTitle = '';
    public function getFormTitle()
    {
        return $this->formTitle;
    }
    public function FormTitle($title): self
    {
        $this->formTitle = $title;
        return $this;
    }
}
