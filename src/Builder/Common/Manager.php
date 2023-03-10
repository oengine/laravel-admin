<?php

namespace OEngine\Admin\Builder\Common;

abstract class Manager
{
    private static $managers = [];
    public static function Register($manager)
    {
        self::$managers[] = $manager;
    }
    public static function find($key)
    {
        foreach (self::$managers as $item) {
            if ($item->getKey() == $key) {
                return $item;
            }
        }
        return null;
    }
    public static function Create()
    {
        return new (get_called_class());
    }
    protected function __construct()
    {
    }

    public abstract function getKey();
    public abstract function getFields();

    public function getModelKey()
    {
        return "id";
    }
    public abstract function getModel();
    public abstract function getForm();
    public abstract function getTable();
    public function getTableView()
    {
        return \OEngine\Admin\Http\Livewire\Table\Edit::class;
    }
    public function getFormView()
    {
        return \OEngine\Admin\Http\Livewire\Table\Edit::class;
    }
}
