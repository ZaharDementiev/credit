<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Offer;
use App\PersonalLink;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OffersCrudController extends CrudController
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
        $this->crud->setModel(Offer::class);
        $this->crud->setEntityNameStrings('Оффер', 'Офферы');
        $this->crud->setRoute(backpack_url('offers'));
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
                'name' => 'src',
                'label' => 'Изображение',
                'type' => 'image',
                'height' => '30px',
                'width'  => '30px',
            ],
            [
                'name' => 'probability',
                'label' => 'Вероятность',
                'type' => 'number',
            ],
            [
                'name' => 'amount',
                'label' => 'Сумма',
                'type' => 'number',
            ],
            [
                'name' => 'link',
                'label' => 'Ссылка',
                'type' => 'text',
            ],
            [
                'name' => 'position',
                'label' => 'Номер в списке',
                'type' => 'number',
            ],
        ]);

    }

    public function setupCreateOperation()
    {
        $this->addOfferFields();
    }

    public function setupUpdateOperation()
    {
        $this->addOfferFields();
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

    protected function addOfferFields()
    {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'label' => "Изображение",
                'name' => "src",
                'type' => 'image',
                'aspect_ratio' => 0,
            ],
            [
                'name' => 'probability',
                'label' => 'Вероятность',
                'type' => 'number',
            ],
            [
                'name' => 'amount',
                'label' => 'Сумма',
                'type' => 'number',
            ],
            [
                'name' => 'link',
                'label' => 'Ссылка',
                'type' => 'text',
            ],
            [
                'name' => 'position',
                'label' => 'Номер в списке',
                'type' => 'number',
            ],
        ]);
    }
}
