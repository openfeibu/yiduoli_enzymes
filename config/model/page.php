<?php

return [


/*
 * Package .
 */
    'package'  => 'page',

/*
 * Modules .
 */
    'modules'  => ['page', 'category'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'page'     => [
        'model'        => 'App\Models\Page',
        'table'        => 'pages',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'slugs'        => [],
        'dates'        => ['deleted_at'],
        'fillable'     => ['meta_title', 'meta_keyword','meta_description','title', 'category_id','slug', 'order', 'view', 'compile', 'status','upload_folder','file', 'image','images','description','content', 'recommend_type','home_recommend','hot_recommend'],
        'translate'    => [],
        'upload_folder' => '/page',
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
            'images' => 'array',
        ],
        'encrypt'      => ['id'],
        'revision'     => ['name', 'title'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],
    'category' => [
        'model'        => 'App\Models\PageCategory',
        'table'        => 'page_categories',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'slugs'        => ['slug' => 'slug'],
        'fillable'     => [ 'name', 'slug', 'order','parent_id'],
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
            'slug'  => 'like',
        ],
    ],
    'recruit' => [
        'model'        => 'App\Models\Recruit',
        'table'        => 'recruits',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'upload_folder' => '/page/recruit',
        'fillable'     => [ 'title', 'address', 'salary','requirement','duty','order','image'],
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],
];
