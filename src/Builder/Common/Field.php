<?php

namespace OEngine\Admin\Builder\Common;

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
    public static function Create(): self
    {
        return new self();
    }
    public const TEXT = 'text';
    public const NUMBER = 'number';
    public const DATE = 'date';
    public const DATETIME = 'datetime';


    private $fieldType = self::TEXT;
    public function getFieldType()
    {
        return $this->fieldType;
    }
    public function setFieldType($fieldType): self
    {
        $this->fieldType = $fieldType;
        return $this;
    }

    private $title = '';
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title): self
    {
        $this->title = $title;
        if (!$this->tableTitle) $this->setTableTitle($title);
        if (!$this->formTitle) $this->setFormTitle($title);
        return $this;
    }
    private $tableTitle = '';
    public function getTableTitle()
    {
        return $this->tableTitle;
    }
    public function setTableTitle($title): self
    {
        $this->tableTitle = $title;
        return $this;
    }
    private $formTitle = '';
    public function getFormTitle()
    {
        return $this->formTitle;
    }
    public function setFormTitle($title): self
    {
        $this->formTitle = $title;
        return $this;
    }
}
