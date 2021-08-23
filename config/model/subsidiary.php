<?php

return [

/*
 * Modules .
 */
    'modules'  => ['subsidiary'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'subsidiary'     => [
        'model'        => 'App\Models\Subsidiary',
        'table'        => 'subsidiaries',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['parent_id','name', 'url', 'image', 'order','content'],
        'translate'    => ['parent_id','name', 'url', 'image', 'order','content'],
        'upload_folder' => '/subsidiary',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
        ],
    ],

];
