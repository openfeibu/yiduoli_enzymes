<?php

return [

/*
 * Modules .
 */
    'modules'  => ['feedback'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'feedback'     => [
        'model'        => 'App\Models\Feedback',
        'table'        => 'feedbacks',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['name', 'phone','email','content', 'ip'],
        'translate'    => [],
        'upload_folder' => '/feedback',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
        ],
    ],

];
