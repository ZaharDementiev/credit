<?php

namespace App\Http\Controllers\Admin;

use App\Withdrawal;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class WithdrawalCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel(Withdrawal::class);
        $this->crud->setEntityNameStrings('Вывод', 'Выводы');
        $this->crud->setRoute(backpack_url('withdrawals'));
        $this->crud->allowAccess('show');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'amount',
                'label' => 'Сумма',
                'type' => 'number',
            ],
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'name' => 'created_at',
                'label' => 'Дата',
                'type' => 'datetime',
            ],
        ]);

    }

    public function setupCreateOperation()
    {
        $this->addWithdrawalFields();
    }

    public function setupUpdateOperation()
    {
        $this->addWithdrawalFields();
    }

    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitStore();
    }

    public function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }

    protected function addWithdrawalFields()
    {
        $this->crud->addFields([
            [
                'name' => 'amount',
                'label' => 'Сумма',
                'type' => 'number',
            ],
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
        ]);
    }
}
