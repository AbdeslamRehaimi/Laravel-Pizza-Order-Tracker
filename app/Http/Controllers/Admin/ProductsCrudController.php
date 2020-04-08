<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Products;

/**
 * Class ProductsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Products');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/products');
        $this->crud->setEntityNameStrings('products', 'products');
    }

    protected function setupListOperation(){
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $C1 = [
            'name' => 'Nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $C2 = [
            'name' => 'Prix',
            'type' => 'text',
            'label' => 'Prix',
        ];

        $C3 = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'Promo',
        ];

        $C4 = [
            'name' => 'Prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $C5 = [
            'name' => 'categories.NomCategorie',
            'type' => 'text',
            'label' => 'Category',
            'entity' => 'categories',
            'attribute' => 'nomcategorie',
            'model' => \App\Models\Categories::class,
        ];
        $C6 = [
            'name' => 'Date_Debut',
            'type' => 'Date',
            'label' => 'Date Debut'
        ];
        $C7 = [
            'name' => 'Date_Fin',
            'type' => 'Date',
            'label' => 'Date Fin'
        ];

        $C8 = [
            'name' => 'imgPath',
            'label' => 'Image',
            'type' => 'image',
            //'prefix' => 'storage/',
            //'prefix' => 'uploads/',
            'height' => '50px',
            'width' => '80px',
        ];
        $this->crud->addColumns([$C1, $C2, $C3, $C4, $C5, $C6, $C7,$C8]);
    }

    protected function setupCreateOperation(){
        $this->crud->setValidation(ProductsRequest::class);
        $this->crud->setOperationSetting('contentClass', 'col-md-8');
        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $nameField=[
            'name' => 'Nom',
            'label' => 'Nom',
            'type' => 'text',
        ];
        $priceField=
        [
            'name' => 'Prix',
            'label' => 'Prix',
            'attributes' => ["step" => "any"],
            'prefix' => "DH",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];
        $remiseField= [
            'name' => 'Remise',
            'label' => 'Remise',
            'type' => 'number',
            'attributes' => ["step" => "any"],
            'default' => '0',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];
        $categoryField= [
            'label' => "Category",
            'type' => 'select',
            'name' => 'catID',
            'entity' => 'categories',
            'attribute' => 'NomCategorie',
            'model' => "App\Models\Categories",
            'options'   => (function ($query) {
                return $query->orderBy('NomCategorie', 'ASC')->get();
             }),
            ];
        $dateDebutField=[
            'name' => 'Date_Debut',
            'label' => 'Date Debut',
            'type' => 'date',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];
        $dateFinField=[
            'name' => 'Date_Fin',
            'label' => 'Date Fin',
            'type' => 'date',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ];

        $imagePathField = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            //'prefix' => 'storage/',
            'prefix' => 'uploads/images/products/',
            'height' => '400px',
            'crop' => true,
            'aspect_ratio' => 1,
            'upload' => true,
            'tab' => 'Upload Image',
        ];
        $promoField = [
            'name' => 'isPromo',
            'label' => 'Promotion ? ',
            'type' => 'checkbox',

        ];
        $this->crud->addField($nameField);
        $this->crud->addField($categoryField);
        $this->crud->addField($priceField);
        $this->crud->addField($remiseField);
        $this->crud->addField($dateDebutField);
        $this->crud->addField($dateFinField);
        $this->crud->addField($imagePathField);
        $this->crud->addField($promoField);
        $this->crud->addColumns([$nameField ,$categoryField , $priceField, $remiseField,$promoField ,$imagePathField]);

    }

    protected function setupUpdateOperation(){
        $this->setupCreateOperation();
    }

    protected function setupShowOperation(){
        $imageField = [
            'name' => 'imgPath',
            'label' => 'Image',
            'type' => 'image',
            'height' => '300px',
            'width' => '400px',
        ];
        $nameField=[
            'name' => 'Nom',
            'label' => 'Nom',
            'type' => 'text',
        ];
        $priceField=
        [
            'name' => 'Prix',
            'label' => 'Prix',
            'attributes' => ["step" => "any"],
            'prefix' => "DH",
        ];
        $remiseField= [
            'name' => 'Remise',
            'label' => 'Remise',
            'type' => 'number',
            'attributes' => ["step" => "any"],
            'default' => '0'
        ];
        $categoryField= [
            'label' => "Category",
            'type' => 'select',
            'name' => 'catID',
            'entity' => 'categories',
            'attribute' => 'NomCategorie',
            'model' => "App\Models\Categories",
            'options'   => (function ($query) {
                return $query->orderBy('NomCategorie', 'ASC')->get();
             }),
            ];
        $dateDebutField=[
            'name' => 'Date_Debut',
            'label' => 'Date Debut',
            'type' => 'date'
        ];
        $dateFinField=[
            'name' => 'Date_Fin',
            'label' => 'Date Fin',
            'type' => 'date'
        ];
        $promoField = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'Promo',
        ];
        $this->crud->addColumns([ $imageField, $nameField, $priceField, $remiseField, $categoryField, $dateDebutField, $dateFinField, $promoField ]);
    }
}
