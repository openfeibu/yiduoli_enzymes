<?php

return [

/*
 * Modules .
 */
    'modules'  => ['banner_vid'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'banner_vid'     => [
        'model'        => 'App\Models\BannerVid',
        'table'        => 'banner_vids',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['vid','name','order','image'],
        'translate'    => [],
        'upload_folder' => '/banner_vid',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'name' => 'like',
            'vid'  => 'like',
        ],
    ],

];
