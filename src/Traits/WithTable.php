<?php

namespace OEngine\Admin\Traits;

use Livewire\WithFileUploads;
use Livewire\WithPagination;
use OEngine\Admin\Builder\Common\Manager;
use OEngine\Platform\ColectionPaginate;

trait WithTable
{
    use WithPagination;
    private $cacheManager;
    public $pageSize = 10;
    public function getManager(): Manager|null
    {
        return null;
    }
    protected function cacheManager(): Manager|null
    {
        return $this->cacheManager ?? ($this->cacheManager = $this->getManager());
    }
    public function makeModel()
    {
        if ($manager = $this->cacheManager()) {
            return app($manager->getModel());
        }
        return null;
    }
    public function makeQuery($query)
    {
    }
    public function render()
    {
        $fields = [];
        $buttonAction = [];
        $buttonInTable = [];
        $table = null;
        $data = null;
        if ($manager = $this->cacheManager()) {
            $query =   $this->makeModel();
            $this->makeQuery($query);
            $fields = $manager->getFields();
            $table = $manager->getTable();
            foreach ($table->getButton() as $button) {
                if ($button->getInTable()) {
                    $buttonInTable[] = $button;
                } else {
                    $buttonAction[] = $button;
                }
            }
            $data = ColectionPaginate::getPaginate($query, $this->pageSize);
        }
        return viewt('admin::table.index', [
            'fields' => $fields,
            'table' => $table,
            'data' => $data,
            'buttonAction' => $buttonAction,
            'buttonInTable' => $buttonInTable,
        ]);
    }
}
