<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormulesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormulesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormulesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formules');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formules');
        $this->crud->setEntityNameStrings('formules', 'formules');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
         $nomField = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Formule',
        ];

        $priceField = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];

        $imagePathField = [
            'name' => 'imgPath',
            'label' => 'Image',
            'type' => 'image',
            //'prefix' => 'storage/',
            //'prefix' => 'uploads/',
            'height' => '50px',
            'width' => '80px',
        ];

        $descField = [
            'name' => 'texte',
            'type' => 'text',
            'label' => 'Description',
        ];

        $this->crud->addColumns([$nomField, $priceField, $descField, $imagePathField]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FormulesRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $nomField = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Formule',
        ];

        $priceField=
        [
            'name' => 'prix',
            'label' => 'Prix',
            'attributes' => ["step" => "any"],
            'prefix' => "DH",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-12',
            ],
        ];

        $imagePathField = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            //'prefix' => 'storage/',
            'prefix' => 'public/uploads/images/formules/',
            'height' => '400px',
            'crop' => true,
            'aspect_ratio' => 1,
            'upload' => true,
            'tab' => 'Upload Image',
        ];

        $descField = [
            'name' => 'texte',
            'label' => 'Description',
            //'type' => 'text',
            'type'  => 'wysiwyg',
            'tab'   => 'Recipe',

        ];

        $this->crud->addFields([$imagePathField ,$nomField , $priceField, $descField]);
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation(){

        $descField = [
            'name' => 'texte',
            'label' => 'Description',
            'type' => 'text',
            //'type'  => 'wysiwyg',

        ];

        $nomField = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Formule',
        ];

        $priceField = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];

        $imagePathField = [
            'name' => 'imgPath',
            'label' => 'Image',
            'type' => 'image',
            //'prefix' => 'storage/',
            //'prefix' => 'uploads/',
            'height' => '250px',
            'width' => '263px',
        ];

        $this->crud->addColumns([ $imagePathField, $nomField, $priceField, $descField]);
    }
}
