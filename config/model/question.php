<?php

return [

/*
 * Modules .
 */
    'modules'  => ['question'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'question'     => [
        'model'        => 'App\Models\Question',
        'table'        => 'questions',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['question', 'answer', 'order'],
        'upload_folder' => '/question',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],

];
