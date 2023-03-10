<?php

namespace OEngine\Admin\Traits;

use Livewire\WithFileUploads;
use OEngine\Admin\Builder\Common\Button;
use OEngine\Admin\Builder\Common\Manager;
use OEngine\LaravelPackage\JsonData;

trait WithForm
{
    use WithFileUploads;
    public JsonData $FormData;
    private $cacheManager;
    public $table;
    public $tableId;
    public function mount($table, $id = null)
    {
        $this->table = $table;
        $this->tableId = $id;
    }
    public function getManager(): Manager|null
    {
        return null;
    }
    protected function cacheManager(): Manager|null
    {
        return $this->cacheManager ?? ($this->cacheManager = $this->getManager());
    }

    public function render()
    {
        $fields = [];
        $buttonAction = [];
        $form = null;
        if ($manager = $this->cacheManager()) {
            $form  = $manager->getForm();
            $fields = $manager->getFields();
        }
        if ($form) {
            $buttonAction = $form->getButton();
            if($form->getButtonSave()){
                $buttonAction[]=Button::Create('Save');
            }
        }
        return viewt('admin::table.form', [
            'fields' => $fields,
            'form' => $form,
            'buttonAction' => $buttonAction
        ]);
    }
}
