<?php

namespace App\Http\Controllers\Admin;

use App\PersonalLink;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LinkCrudController extends CrudController
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
        $this->crud->setModel(PersonalLink::class);
        $this->crud->setEntityNameStrings('Ссылка', 'Ссылки');
        $this->crud->setRoute(backpack_url('links'));
        $this->crud->allowAccess('show');
        $this->crud->denyAccess('create');

        $this->crud->addButtonFromView('top', 'generate', 'generate', 'beginning');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'link',
                'label' => 'Ссылка',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'name' => 'stat',
                'label' => 'Статистика',
                'type' => 'model_function',
                'function_name' => 'statistic',
                'limit' => 1000,
            ],
            [
                'name' => 'thisOpenings',
                'label' => 'Обычных открытий',
                'type' => 'model_function',
                'function_name' => 'linkOpenings',
                'limit' => 1000,
            ],
            [
                'name' => 'thisUnique_openings',
                'label' => 'Уникальных открытий',
                'type' => 'model_function',
                'function_name' => 'linkUniqueOpenings',
                'limit' => 1000,
            ],
            [
                'name' => 'sms_link',
                'label' => 'Для СМС рассылки',
                'type' => 'boolean',
                'options' => [0 => 'Нет', 1 => 'Да']
            ],
        ]);

    }

    public function setupCreateOperation()
    {
        $this->addLinkFields();
    }

    public function setupUpdateOperation()
    {
        $this->addLinkFields();
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
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
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }

    /**
     * Handle password input fields.
     */
    protected function handlePasswordInput($request)
    {
        // Remove fields not present on the user.
        $request->request->remove('password_confirmation');
        $request->request->remove('roles_show');
        $request->request->remove('permissions_show');

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }

    protected function addLinkFields()
    {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'name' => 'sms_link',
                'label' => 'Для СМС рассылки',
                'type' => 'boolean',
                'options' => [0 => 'Нет', 1 => 'Да']
            ],
        ]);
    }

    public function generate()
    {
        $personalLink = new PersonalLink();
        $personalLink->link = route('index') . '/' . Str::random();
        $personalLink->save();
        return redirect()->back();
    }

    public function stat($id)
    {
        return view(backpack_view('stat'), compact('id'));
    }
}
