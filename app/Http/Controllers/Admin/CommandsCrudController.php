<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommandsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommandsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommandsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkCloneOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commands');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commands');
        $this->crud->setEntityNameStrings('commands', 'commands');


    /*
        |--------------------------------------------------------------------------
        | LIST OPERATION
        |--------------------------------------------------------------------------
        */

    $this->crud->operation('list', function () {


        $this->crud->addColumn([
            'name' => 'date',
            'type' => 'datetime',
            'label' => 'Date',
        ]);
        $this->crud->addColumn([
            'name' => 'adressLiv',
            'type' => 'text',
            'label' => 'Adresse',
        ]);

        $this->crud->addColumn([
            'name' => 'type',
            'type' => 'text',
            'label' => 'Type',
        ]);
        $this->crud->addColumn([
            'name' => 'realise',
            'type' => 'boolean',
            'label' => 'Realiser',
        ]);
        $this->crud->addColumn([
            'name' => 'secteur',
            'type' => 'text',
            'label' => 'Secteur',
        ]);

        $this->crud->addColumn([
            'label' => 'Client',
            'type' => 'select',
            'name' => 'numClient',
            'entity' => 'clients',
            'attribute' => 'nom',
            'wrapper'   => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('clients/'.$related_key.'/show');
                },
            ],
        ]);
        $this->crud->addFilter([ // select2 filter
            'name' => 'numClient',
            'type' => 'select2',
            'label'=> 'Client',
        ], function () {
            return \app\Models\Clients::all()->keyBy('id')->pluck('nom', 'id')->toArray();
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'numClient', $value);
        });



        $this->crud->addColumn('products');
        $this->crud->addFilter([ // select2_multiple filter
            'name' => 'products',
            'type' => 'select2_multiple',
            //'type' => 'select',
            'label'=> 'Products',
        ], function () {
            return \App\Models\Products::all()->keyBy('id')->pluck('Nom', 'id')->toArray();
        }, function ($values) { // if the filter is active
            $this->crud->query = $this->crud->query->whereHas('products', function ($q) use ($values) {
                foreach (json_decode($values) as $key => $value) {
                    if ($key == 0) {
                        $q->where('products.id', $value);
                    } else {
                        $q->orWhere('products.id', $value);
                    }
                }
            });
        });
    });


        /*
        |--------------------------------------------------------------------------
        | CREATE & UPDATE OPERATIONS
        |--------------------------------------------------------------------------
        */
        $this->crud->operation(['create', 'update'], function () {
            $this->crud->setValidation(CommandsRequest::class);

            $this->crud->addField([
                'name' => 'adressLiv',
                'type'  =>  'address_algolia',
                'label' => 'Adresse',
                'tab' =>'CommandInfo',
                //'placeholder' => 'Your title here',
            ]);
            $this->crud->addField([
                'name' => 'type',
                'type' => 'text',
                'label' => 'Type',
                'tab' =>'CommandInfo',
                //'hint' => 'Type.',
                // 'disabled' => 'disabled'
            ]);
           // $this->crud->addField([
              //  'name' => 'date',
                //'label' => 'Date',
                //'type' => 'date',
                //'default' => date('Y-m-d'),
            //]);
            $this->crud->addField([
                'name' => 'secteur',
                'type' => 'text',
                'label' => 'Secteur',
                'tab' =>'CommandInfo',
            ]);
            $this->crud->addField([
                'name' => 'realise',
                'type' => 'boolean',
                'label' => 'Realiser',
                'tab' =>'CommandInfo',
            ]);
            $this->crud->addField([
                'label' => 'Client',
                'type' => 'select',
                'name' => 'numClient',
                'entity' => 'clients',
                'attribute' => 'nom',
                'inline_create' => true,
                'ajax' => true,
            ]);

            $this->crud->addField([
                'label' => 'Products',
                'type' => 'Select2_multiple',
                'name' => 'products', // the method that defines the relationship in your Model
                'entity' => 'products', // the method that defines the relationship in your Model
                'attribute' => 'Nom', // foreign key attribute that is shown to user
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                'inline_create' => ['entity' => 'products'],
                'ajax' => true,
            ]);

//--------------------------------For FORMULES
            $this->crud->addField([
                /*
                'label' => 'Formules',
                'type' => 'select',
                'name' => 'fformules',
                'entity' => 'fformules',
                'attribute' => 'nomFormule',
                 'inline_create' => ['entity' => 'formules'],
                'ajax' => true,
                'pivot' => true,
                'tab' => 'Formules',
                */
                'label' => 'Formules',
                'type' => 'select2',
                'name' => 'numFormule',
                'entity' => 'fformules',
                'attribute' => 'nomFormule',
                'inline_create' => ['entity' => 'formules'],
                'inline_create' => true,
                'ajax' => true,
                'options'   => (function ($query) {
                    return $query->orderBy('nomFormule', 'DESC')->get();
                 }),
                'tab' => 'Formules',

             ]);

            $this->crud->addField([
                'label' => 'ProductsFormules',
                'type' => 'Select2_multiple',
                'name' => 'fproducts', // the method that defines the relationship in your Model
                'entity' => 'fproducts', // the method that defines the relationship in your Model
                'attribute' => 'Nom', // foreign key attribute that is shown to user
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                'inline_create' => ['entity' => 'products'],
                'ajax' => true,
                'tab' => 'Formules',
            ]);


        });
    }




    /**
     * Respond to AJAX calls from the select2 with entries from the Category model.
     * @return JSON
     */
    public function fetchClients()
    {
        return $this->fetch(\app\Models\Clients::class);
    }

    /**
     * Respond to AJAX calls from the select2 with entries from the Tag model.
     * @return JSON
     */
    public function fetchProducts()
    {
        return $this->fetch(\app\Models\Products::class);
    }


    /**
     * Respond to AJAX calls from the select2 with entries from the Tag model.
     * @return JSON
     */
    public function fetchFormules()
    {
        return $this->fetch(\app\Models\Formules::class);
    }






}
