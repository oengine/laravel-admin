<?php

namespace OEngine\Admin\Builder\Common;

class Form
{
    public static function Create(): self
    {
        return new self();
    }
    private $layout;
    public function getLayout()
    {
        return $this->layout;
    }
    public function setLayout($layout): self
    {
        $this->layout = $layout;
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
