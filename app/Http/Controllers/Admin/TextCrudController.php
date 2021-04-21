<?php

namespace App\Http\Controllers\Admin;

use App\PersonalLink;
use App\Text;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TextCrudController extends CrudController
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
        $this->crud->setModel(Text::class);
        $this->crud->setEntityNameStrings('Текст', 'Тексы');
        $this->crud->setRoute(backpack_url('texts'));
        $this->crud->allowAccess('show');
        $this->crud->denyAccess('create');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'text',
                'label' => 'Текст',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'name' => 'slug',
                'label' => 'Идентификатор',
                'type' => 'text',
            ],
        ]);

    }

    public function setupCreateOperation()
    {
        $this->addUserFields();
    }

    public function setupUpdateOperation()
    {
        $this->addUserFields();
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

    protected function addUserFields()
    {
        $this->crud->addFields([
            [
                'name' => 'text',
                'label' => 'Текст',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
        ]);
    }
}
