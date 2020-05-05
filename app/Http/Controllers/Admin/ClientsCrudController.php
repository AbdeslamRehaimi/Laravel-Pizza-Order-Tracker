<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Clients');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/clients');
        $this->crud->setEntityNameStrings('clients', 'clients');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb()

        $nomField = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];

        $prenomField = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];

        $adrField = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'Adresse',
        ];

        $emailField = [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
        ];

        $logField = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'Username',
        ];

        $dateField = [
            'name' => 'created_at',
            'type' => 'date',
            'label' => 'Date Creation',
        ];

        $imageField = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '50px',
            'width' => '80px',
        ];

        $caField = [
            'name' => 'ca',
            'type' => 'text',
            'label' => 'Ca',
        ];

        $adminField = [
            'name' => 'admin',
            'type' => 'text',
            'label' => 'Role',
        ];

        $this->crud->addColumns([$adminField, $nomField,$prenomField,$adrField,$emailField,$dateField,$imageField]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientsRequest::class);
        $this->crud->setOperationSetting('contentClass', 'col-md-8');

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $imageField = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            //'prefix' => 'storage/',
            'prefix' => 'uploads/images/clients/',
            'height' => '300px',
            'crop' => true,
            'aspect_ratio' => 1,
            'upload' => true,
            'tab' => 'Client Image',
        ];

        $nomField = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];

        $prenomField = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prenom',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];

        $adrField = [
            'name' => 'adresse',
            //'type' => 'text',
            'type'  =>  'address_algolia',
            'label' => 'Adresse',
        ];

        $emailField = [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
        ];

        $caField = [
            'name' => 'ca',
            'attributes' => ["step" => "any"],
            'prefix' => "Chiffre Affaire",
            'label' => 'Chiffre Affaire',
        ];

        $logField = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'Username',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];

        $passField = [
            'name' => 'motdepasse',
            'type' => 'Password',
            'label' => 'Mot de pass',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];
        $passVerField = [
            'name' => 'repetermotdepasse',
            'type' => 'Password',
            'label' => 'Retaper Password',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];

        $adminField = [
            'name' => 'admin',
            'type' => 'select_from_array',
            'label' => 'Role',
            'options' => [
                'Admin' => 'Admin',
                'User' => 'User',
                'Client' => 'Client',
            ],
            'allows_multiple'   => false,
            'allows_null'       => true,
        ];

        $this->crud->addFields([$imageField, $nomField,$prenomField,$adrField,$emailField,$logField,$passField, $passVerField, $caField, $adminField]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->setOperationSetting('contentClass', 'col-md-8');
        $nomField = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];

        $prenomField = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];

        $adrField = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'Adresse',
        ];

        $emailField = [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
        ];

        $logField = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'Role',
        ];

        $dateField = [
            'name' => 'created_at',
            'type' => 'date',
            'label' => 'Date debut',
        ];

        $imageField = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            //'prefix' => 'uploads/',
             //'prefix' => 'storage/',
             'height' => '300px',
             'width' => '400px',
            'tab' => 'Client Image',
        ];

        $caField = [
            'name' => 'ca',
            'type' => 'text',
            'label' => 'Ca',
        ];

        $this->crud->addColumns([$imageField, $nomField,$prenomField,$adrField,$emailField,$logField,$dateField]);
    }
}
