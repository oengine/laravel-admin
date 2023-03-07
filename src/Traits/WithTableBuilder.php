<?php

namespace OEngine\Admin\Traits;

use OEngine\Admin\Builder\Common\Manager;
use OEngine\Platform\ColectionPaginate;

trait WithTableBuilder
{
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
        $table = null;
        $data = null;
        if ($manager = $this->cacheManager()) {
            $query =   $this->makeModel();
            $this->makeQuery($query);
            $fields = $manager->getFields();
            $data = ColectionPaginate::getPaginate($query, $this->pageSize);
        }
        return viewt('admin::builder.table.index', [
            'fields' => $fields,
            'table' => $table,
            'data' => $data,
        ]);
    }
}
