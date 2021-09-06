<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/product_categories', 'ProductCategoryController@getCategories')->name('product_categories');
Route::get('/product_categories_tree', 'ProductCategoryController@getCategoriesTree')->name('product_categories_tree');
Route::get('/subsidiary_tree', 'SubsidiaryController@getSubsidiaryTree')->name('subsidiary_tree');
Route::get('/href', 'HomeController@href')->name('href');

// Admin  routes  for user
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Auth::routes();
    Route::get('password', 'UserController@getPassword');
    Route::post('password', 'UserController@postPassword');
    Route::get('locked', 'UserController@locked');
    Route::get('/', 'ResourceController@home')->name('home');
    Route::get('/dashboard', 'ResourceController@dashboard')->name('dashboard');
    Route::resource('banner', 'BannerResourceController');
    Route::post('/banner/destroyAll', 'BannerResourceController@destroyAll');

    Route::resource('banner_vid', 'BannerVidResourceController');
    Route::post('/banner_vid/destroyAll', 'BannerVidResourceController@destroyAll');

    Route::resource('news', 'NewsResourceController');
    Route::post('/news/destroyAll', 'NewsResourceController@destroyAll')->name('news.destroy_all');
    Route::post('/news/updateRecommend', 'NewsResourceController@updateRecommend')->name('news.update_recommend');
    Route::resource('system_page', 'SystemPageResourceController');
    Route::post('/system_page/destroyAll', 'SystemPageResourceController@destroyAll')->name('system_page.destroy_all');
    Route::get('/setting/company', 'SettingResourceController@company')->name('setting.company.index');
    Route::post('/setting/updateCompany', 'SettingResourceController@updateCompany');
    Route::get('/setting/publicityVideo', 'SettingResourceController@publicityVideo')->name('setting.publicity_video.index');
    Route::post('/setting/updatePublicityVideo', 'SettingResourceController@updatePublicityVideo');
    Route::get('/setting/station', 'SettingResourceController@station')->name('setting.station.index');
    Route::post('/setting/updateStation', 'SettingResourceController@updateStation');

    Route::resource('link', 'LinkResourceController');
    Route::post('/link/destroyAll', 'LinkResourceController@destroyAll')->name('link.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::resource('role', 'RoleResourceController');

//    Route::group(['prefix' => 'page','as' => 'page.'], function ($router) {
//        Route::resource('page', 'PageResourceController');
//        Route::resource('category', 'PageCategoryResourceController');
//    });

    Route::group(['prefix' => 'page','as' => 'page.','namespace' => 'Page'], function ($router) {
        /*关于我们*/
        Route::get('/about', 'AboutResourceController@show')->name('about.index');
        Route::get('/about/show', 'AboutResourceController@show')->name('about.show');
        Route::post('/about/store', 'AboutResourceController@store')->name('about.store');
        Route::put('/about/update/{page}', 'AboutResourceController@update')->name('about.update');

        /*工业酶*/
        Route::get('/industrial_enzyme', 'IndustrialEnzymeResourceController@show')->name('industrial_enzyme.index');
        Route::get('/industrial_enzyme/show', 'IndustrialEnzymeResourceController@show')->name('industrial_enzyme.show');
        Route::post('/industrial_enzyme/store', 'IndustrialEnzymeResourceController@store')->name('industrial_enzyme.store');
        Route::put('/industrial_enzyme/update/{page}', 'IndustrialEnzymeResourceController@update')->name('industrial_enzyme.update');

        /*工业酶设备图片*/
        Route::get('/industrial_enzyme_image', 'IndustrialEnzymeImageResourceController@show')->name('industrial_enzyme_image.index');
        Route::get('/industrial_enzyme_image/show', 'IndustrialEnzymeImageResourceController@show')->name('industrial_enzyme_image.show');
        Route::post('/industrial_enzyme_image/store', 'IndustrialEnzymeImageResourceController@store')->name('industrial_enzyme_image.store');
        Route::put('/industrial_enzyme_image/update/{page}', 'IndustrialEnzymeImageResourceController@update')->name('industrial_enzyme_image.update');

        /*企业概况*/
        Route::resource('profile', 'ProfileResourceController');
        Route::post('/profile/destroyAll', 'ProfileResourceController@destroyAll')->name('profile.destroy_all');

    });

    Route::group(['prefix' => 'menu'], function ($router) {
        Route::get('index', 'MenuResourceController@index');
    });

    Route::group(['prefix' => 'nav','as' => 'nav.'], function ($router) {
        Route::resource('nav', 'NavResourceController');
        Route::post('/nav/destroyAll', 'NavResourceController@destroyAll')->name('nav.destroy_all');
        Route::resource('category', 'NavCategoryResourceController');
        Route::post('/category/destroyAll', 'NavCategoryResourceController@destroyAll')->name('category.destroy_all');
    });

    Route::post('/media_folder/store', 'MediaResourceController@folderStore')->name('media_folder.store');
    Route::delete('/media_folder/destroy', 'MediaResourceController@folderDestroy')->name('media_folder.destroy');
    Route::put('/media_folder/update/{media_folder}', 'MediaResourceController@folderUpdate')->name('media_folder.update');
    Route::get('/media', 'MediaResourceController@index')->name('media.index');
    Route::put('/media/update/{media}', 'MediaResourceController@update')->name('media.update');
    Route::post('/media/upload', 'MediaResourceController@upload')->name('media.upload');
    Route::delete('/media/destroy', 'MediaResourceController@destroy')->name('media.destroy');

    Route::post('/upload/{config}/{path?}', 'UploadController@upload')->where('path', '(.*)');
    Route::post('/file/{config}/{path?}', 'UploadController@uploadFile')->where('path', '(.*)');

    Route::resource('admin_user', 'AdminUserResourceController');
    Route::post('/admin_user/destroyAll', 'AdminUserResourceController@destroyAll')->name('admin_user.destroy_all');
    Route::post('/admin_user/validate', 'AdminUserResourceController@validateData')->name('admin_user.validate');

    Route::resource('permission', 'PermissionResourceController');
    Route::post('/permission/destroyAll', 'PermissionResourceController@destroyAll')->name('permission.destroy_all');
    Route::resource('role', 'RoleResourceController');
    Route::post('/role/destroyAll', 'RoleResourceController@destroyAll')->name('role.destroy_all');
    Route::get('logout', 'Auth\LoginController@logout');


    Route::resource('video', 'VideoResourceController');
    Route::post('/video/destroyAll', 'VideoResourceController@destroyAll')->name('video.destroy_all');
    Route::post('/video/updateRecommend', 'VideoResourceController@updateRecommend')->name('video.update_recommend');

    Route::resource('product_category', 'ProductCategoryResourceController');
    Route::resource('product', 'ProductResourceController');
    Route::post('/product/destroyAll', 'ProductResourceController@destroyAll')->name('product.destroy_all');
    Route::post('/product/destroy_image', 'ProductResourceController@destroyImage');

    Route::resource('product_tag', 'ProductTagResourceController');
    Route::post('/product_tag/destroyAll', 'ProductTagResourceController@destroyAll')->name('product_tag.destroy_all');

    Route::resource('academic_report', 'AcademicReportResourceController');
    Route::post('/academic_report/destroyAll', 'AcademicReportResourceController@destroyAll')->name('academic_report.destroy_all');

    Route::resource('subsidiary', 'SubsidiaryResourceController');
    Route::post('/subsidiary/destroyAll', 'SubsidiaryResourceController@destroyAll')->name('subsidiary.destroy_all');

    Route::resource('feedback', 'FeedbackResourceController');
    Route::post('/feedback/destroyAll', 'FeedbackResourceController@destroyAll')->name('feedback.destroy_all');

    Route::resource('question', 'QuestionResourceController');
    Route::post('/question/destroyAll', 'QuestionResourceController@destroyAll')->name('question.destroy_all');

});

Route::group([
    'namespace' => 'Pc',
    'as' => 'pc.',
], function () {
    Route::get('/','HomeController@home')->name('home');

    Route::get('/about','SinglePageController@about')->name('about');
    Route::get('/enzyme','SinglePageController@IndustrialEnzyme')->name('enzyme');
    Route::get('/industrial_enzyme','SinglePageController@IndustrialEnzyme')->name('industrial_enzyme');
    Route::get('/industrial_enzyme_image','SinglePageController@IndustrialEnzymeImage')->name('industrial_enzyme_image');

    Route::get('/#feedback','HomeController@home')->name('feedback');
    Route::get('/news_center',function (){
        return redirect('/news_center/news');
    })->name('news_center');
    Route::get('/news_center/news','NewsController@index')->name('news.index');
    Route::get('/news_center/news/{news}','NewsController@show')->name('news.show');

    Route::get('/news_center/video','VideoController@index')->name('video.index');
    Route::get('/news_center/video/{video}','VideoController@index')->name('video.show');


    Route::get('/feedback','FeedBackController@index')->name('feedback.index');
    Route::post('/feedback','FeedBackController@store')->name('feedback.store');


    Route::get('/product','ProductController@index')->name('product.index');
    Route::get('/product/{product}','ProductController@show')->name('product.show');


    /*

    Auth::routes();
    Route::get('/user/login','Auth\LoginController@showLoginForm');


    Route::get('email-verification/index','Auth\EmailVerificationController@getVerificationIndex')->name('email-verification.index');
    Route::get('email-verification/error','Auth\EmailVerificationController@getVerificationError')->name('email-verification.error');
    Route::get('email-verification/check/{token}', 'Auth\EmailVerificationController@getVerification')->name('email-verification.check');
    Route::get('email-verification-required', 'Auth\EmailVerificationController@required')->name('email-verification.required');

    Route::get('verify/send', 'Auth\LoginController@sendVerification');
    Route::get('verify/{code?}', 'Auth\LoginController@verify');
    */

});

//Route::get('
///{slug}.html', 'PagePublicController@getPage');
/*
Route::group(
    [
        'prefix' => trans_setlocale() . '/admin/menu',
    ], function () {
    Route::post('menu/{id}/tree', 'MenuResourceController@tree');
    Route::get('menu/{id}/test', 'MenuResourceController@test');
    Route::get('menu/{id}/nested', 'MenuResourceController@nested');

    Route::resource('menu', 'MenuResourceController');
   // Route::resource('submenu', 'SubMenuResourceController');
});
*/