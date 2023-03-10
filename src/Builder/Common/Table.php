<?php

namespace OEngine\Admin\Builder\Common;

class Table
{
    public static function Create(): self
    {
        return new self();
    }

    private $button = [];
    public function getButton()
    {
        return $this->button;
    }
    public function Button($button = []): self
    {
        $this->button = $button;
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
    private $view;
    public function getView()
    {
        return $this->view;
    }
    public function setView($view): self
    {
        $this->view = $view;
        return $this;
    }
}
