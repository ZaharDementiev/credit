<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\PersonalLink;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BankCrudController extends CrudController
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
        $this->crud->setModel(Bank::class);
        $this->crud->setEntityNameStrings('Банк', 'Банки');
        $this->crud->setRoute(backpack_url('banks'));
        $this->crud->allowAccess('show');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'name' => 'link',
                'label' => 'Ссылка',
                'type' => 'text',
            ],
        ]);

    }

    public function setupCreateOperation()
    {
        $this->addBankFields();
    }

    public function setupUpdateOperation()
    {
        $this->addBankFields();
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitStore();
    }

    /**
     * Update the specified resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }

    protected function addBankFields()
    {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'name' => 'link',
                'label' => 'Ссылка',
                'type' => 'text',
            ],
        ]);
    }
}
