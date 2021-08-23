<?php

return [

/*
 * Modules .
 */
    'modules'  => ['video'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'video'     => [
        'model'        => 'App\Models\Video',
        'table'        => 'videos',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'slugs'        => [],
        'dates'        => ['deleted_at'],
        'fillable'     => ['meta_title', 'meta_keyword','meta_description','title','vid','slug', 'order', 'status','image','images','description','content','home_recommend','hot_recommend'],
        'translate'    => [],
        'upload_folder' => '/video',
        'uploads'      => [
            'image' => [
                'count' => 1,
                'type'  => 'image',
            ],
            'images' => [
                'count' => 10,
                'type'  => 'image',
            ],
        ],
        'casts'        => [
            'image' => 'array',
            'images' => 'array',
        ],
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],

];
