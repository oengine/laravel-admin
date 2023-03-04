<?php

namespace OEngine\Admin\Builder\Common;

class Table
{
    public static function Create(): self
    {
        return new self();
    }
    private $fields;
    public function getFields()
    {
        return $this->fields;
    }
    public function setFields($fields): self
    {
        $this->fields = $fields;
        return $this;
    }
    private $firstCheckbox = false;
    public function getFirstCheckbox()
    {
        return $this->firstCheckbox;
    }
    public function enableFirstCheckbox($flg = true): self
    {
        $this->firstCheckbox = $flg;
        return $this;
    }
    private $searchBox = false;
    public function showSearchbox()
    {
        return $this->searchBox;
    }
    public function enableSearchbox($flg = true): self
    {
        $this->searchBox = $flg;
        return $this;
    }
}
