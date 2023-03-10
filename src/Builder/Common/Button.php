<?php

namespace OEngine\Admin\Builder\Common;

use Illuminate\Database\Eloquent\Model;

class Button
{
    public static function Create($title = ''): self
    {
        return new self($title);
    }
    protected function __construct($title)
    {
        $this->Title($title);
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
    private $icon = '';
    public function getIcon()
    {
        return $this->icon;
    }
    public function Icon($icon): self
    {
        $this->icon = $icon;
        return $this;
    }
    private $inTable = false;
    public function getInTable()
    {
        return  $this->inTable;
    }
    public function InTable(): self
    {
        $this->inTable = true;
        return $this;
    }
    private $link = '';
    public function getLink()
    {
        return $this->link;
    }
    public function Link($link): self
    {
        $this->link = $link;
        return $this;
    }
    public function Route($name, $param = []): self
    {
        return $this->Link(Route($name, $param));
    }
    private $action = '';
    public function getAction()
    {
        return $this->action;
    }
    public function Action($name, $param = []): self
    {
        $this->action = platform_action($name, $param);
        return $this;
    }
}
