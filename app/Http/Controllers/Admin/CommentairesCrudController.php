<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentairesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentairesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentairesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commentaires');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commentaires');
        $this->crud->setEntityNameStrings('commentaires', 'commentaires');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters

        $client = [
            'name' => 'clients.name',
            'type' => 'text',
            'label' => 'Client',
            'attribute' => 'name',
            'entity' => 'clients',
            'model' => \App\Models\Clients::class,
        ];
        $produit = [
            'name' => 'products.Nom',
            'type' => 'text',
            'label' => 'Produit',
            'entity' => 'products',
            'attribute' => 'Nom',
            'model' => \App\Models\Categories::class,
        ];

        $commenteField = [
            'name' => 'texte',
            'type' => 'text',
            'label' => 'Commentaire',
        ];

        $dateField = [
            'name' => 'date_pub',
            'type' => 'datetime',
            'label' => 'Date',
        ];

        $this->crud->addColumns([$client, $produit, $commenteField, $dateField]);

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommentairesRequest::class);

        // TODO: remove setFromDb() and manually define Fields

        $produits= [
            'label' => "Produit",
            'type' => 'select',
            'name' => 'codeProduit',
            'entity' => 'products',
            'attribute' => 'Nom',
            'model' => "App\Models\Products",
            'options'   => (function ($query) {
                return $query->orderBy('Nom', 'ASC')->get();
             }),
            ];

            $clients= [
                'label' => "Client",
                'type' => 'select',
                'name' => 'numClient',
                'entity' => 'clients',
                'attribute' => 'name',

                'model' => "App\Models\Clients",
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                 }),
                ];

                $texte = [
                    'name' => 'texte',
                    'label' => 'Comment',
                    'type' => 'textarea',

                ];



                $this->crud->addField($produits);
                $this->crud->addField($clients);
                $this->crud->addField($texte);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation(){


        $produitField= [
            'label' => "Produit",
            'type' => 'select',
            'name' => 'codeProduit',
            'entity' => 'products',
            'attribute' => 'Nom',
            'model' => "App\Models\Products",
            'options'   => (function ($query) {
                return $query->orderBy('Nom', 'ASC')->get();
             }),
            ];

            $clientField= [
                'label' => "Client",
                'type' => 'select',
                'name' => 'numClient',
                'entity' => 'clients',
                'attribute' => 'name',
                'model' => "App\Models\Clients",
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                 }),
                ];

        $this->crud->addColumns([ $produitField, $clientField ]);

        $this->crud->setFromDb();

    }
}
