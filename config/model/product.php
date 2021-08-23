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

    'product'     => [
        'model'        => 'App\Models\Product',
        'table'        => 'products',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'dates'        => ['deleted_at'],
        'fillable'     => ['product_category_id','order','title','description','content','image','vid','instruction','instruction_title','parameters','order'],
        'translate'    => ['product_category_id','order','title','description','content','image','vid','instruction'],
        'upload_folder' => '/product',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],
    'product_category' => [
        'model'        => 'App\Models\ProductCategory',
        'table'        => 'product_categories',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'slugs'        => [],
        'fillable'     => [ 'name','en_name', 'order','parent_id','top_parent_id','category_ids'],
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
        ],
    ],
    'product_image' => [
        'model'        => 'App\Models\ProductImage',
        'table'        => 'product_images',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'slugs'        => [],
        'fillable'     => [ 'url','product_id','order'],
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'url'  => 'like',
        ],
    ],
    'academic_report'=> [
        'model'        => 'App\Models\AcademicReport',
        'table'        => 'academic_reports',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'slugs'        => [],
        'fillable'     => ['file','product_id','title'],
        'upload_folder' => '/academic_report',
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],
];