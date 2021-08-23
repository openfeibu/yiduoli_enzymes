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
        /*董事长致辞*/
        Route::get('/chairman', 'ChairmanResourceController@show')->name('chairman.index');
        Route::get('/chairman/show', 'ChairmanResourceController@show')->name('chairman.show');
        Route::post('/chairman/store', 'ChairmanResourceController@store')->name('chairman.store');
        Route::put('/chairman/update/{page}', 'ChairmanResourceController@update')->name('chairman.update');

        /*企业概况*/
        Route::resource('profile', 'ProfileResourceController');
        Route::post('/profile/destroyAll', 'ProfileResourceController@destroyAll')->name('profile.destroy_all');

        /*企业文化*/
        Route::resource('culture', 'CultureResourceController');
        Route::post('/culture/destroyAll', 'CultureResourceController@destroyAll')->name('culture.destroy_all');

        /*科研团队介绍*/
        Route::get('/scientific_research_team', 'ScientificResearchTeamResourceController@show')->name('scientific_research_team.index');
        Route::get('/scientific_research_team/show', 'ScientificResearchTeamResourceController@show')->name('scientific_research_team.show');
        Route::post('/scientific_research_team/store', 'ScientificResearchTeamResourceController@store')->name('scientific_research_team.store');
        Route::put('/scientific_research_team/update/{page}', 'ScientificResearchTeamResourceController@update')->name('scientific_research_team.update');

        /*科研结构图*/
        Route::get('/scientific_research_structure', 'ScientificResearchStructureResourceController@show')->name('scientific_research_structure.index');
        Route::get('/scientific_research_structure/show', 'ScientificResearchStructureResourceController@show')->name('scientific_research_structure.show');
        Route::post('/scientific_research_structure/store', 'ScientificResearchStructureResourceController@store')->name('scientific_research_structure.store');
        Route::put('/scientific_research_structure/update/{page}', 'ScientificResearchStructureResourceController@update')->name('scientific_research_structure.update');

        /*科研设备概况*/
        Route::get('/scientific_research_equipment', 'ScientificResearchEquipmentResourceController@show')->name('scientific_research_equipment.index');
        Route::get('/scientific_research_equipment/show', 'ScientificResearchEquipmentResourceController@show')->name('scientific_research_equipment.show');
        Route::post('/scientific_research_equipment/store', 'ScientificResearchEquipmentResourceController@store')->name('scientific_research_equipment.store');
        Route::put('/scientific_research_equipment/update/{page}', 'ScientificResearchEquipmentResourceController@update')->name('scientific_research_equipment.update');


        /*联合研究机构*/
        Route::resource('joint_research_institute', 'JointResearchInstituteResourceController');
        Route::post('/joint_research_institute/destroyAll', 'JointResearchInstituteResourceController@destroyAll')->name('joint_research_institute.destroy_all');

        /*公司资料*/
        Route::get('/company_information', 'CompanyInformationResourceController@show')->name('company_information.index');
        Route::get('/company_information/show', 'CompanyInformationResourceController@show')->name('company_information.show');
        Route::post('/company_information/store', 'CompanyInformationResourceController@store')->name('company_information.store');
        Route::put('/company_information/update/{page}', 'CompanyInformationResourceController@update')->name('company_information.update');


        /*公司公告*/
        Route::get('/company_announcement', 'CompanyAnnouncementResourceController@show')->name('company_announcement.index');
        Route::get('/company_announcement/show', 'CompanyAnnouncementResourceController@show')->name('company_announcement.show');
        Route::post('/company_announcement/store', 'CompanyAnnouncementResourceController@store')->name('company_announcement.store');
        Route::put('/company_announcement/update/{page}', 'CompanyAnnouncementResourceController@update')->name('company_announcement.update');

        /*互动问答*/
        Route::get('/interactive', 'InteractiveResourceController@show')->name('interactive.index');
        Route::get('/interactive/show', 'InteractiveResourceController@show')->name('interactive.show');
        Route::post('/interactive/store', 'InteractiveResourceController@store')->name('interactive.store');
        Route::put('/interactive/update/{page}', 'InteractiveResourceController@update')->name('interactive.update');
        /*公司公告*/
        /*
        Route::resource('company_announcement', 'CompanyAnnouncementResourceController');
        Route::post('/company_announcement/destroyAll', 'CompanyAnnouncementResourceController@destroyAll')->name('company_announcement.destroy_all');
*/
        /*服务理念*/
        Route::get('/service_concept', 'ServiceConceptResourceController@show')->name('service_concept.index');
        Route::get('/service_concept/show', 'ServiceConceptResourceController@show')->name('service_concept.show');
        Route::post('/service_concept/store', 'ServiceConceptResourceController@store')->name('service_concept.store');
        Route::put('/service_concept/update/{page}', 'ServiceConceptResourceController@update')->name('service_concept.update');

        /*服务网络*/
        Route::get('/service_network', 'ServiceNetworkResourceController@show')->name('service_network.index');
        Route::get('/service_network/show', 'ServiceNetworkResourceController@show')->name('service_network.show');
        Route::post('/service_network/store', 'ServiceNetworkResourceController@store')->name('service_network.store');
        Route::put('/service_network/update/{page}', 'ServiceNetworkResourceController@update')->name('service_network.update');

        /*加入我们*/
        Route::resource('join_us', 'JoinUsResourceController');
        Route::post('/join_us/destroyAll', 'JoinUsResourceController@destroyAll')->name('join_us.destroy_all');

        /*人才体系*/
        Route::resource('talent_system', 'TalentSystemResourceController');
        Route::post('/talent_system/destroyAll', 'TalentSystemResourceController@destroyAll')->name('talent_system.destroy_all');

    });


    Route::group(['prefix' => 'course','as' => 'course.','namespace' => 'Course'], function ($router) {
        /* 企业荣誉 */
        Route::resource('enterprise_honor', 'EnterpriseHonorResourceController');
        Route::post('/enterprise_honor/destroyAll', 'EnterpriseHonorResourceController@destroyAll')->name('enterprise_honor.destroy_all');
        /* 发展历程 */
        Route::resource('development_course', 'DevelopmentCourseResourceController');
        Route::post('/development_course/destroyAll', 'DevelopmentCourseResourceController@destroyAll')->name('development_course.destroy_all');

        Route::resource('awards_honor', 'AwardsHonorResourceController');
        Route::post('/awards_honor/destroyAll', 'AwardsHonorResourceController@destroyAll')->name('awards_honor.destroy_all');

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

    Route::resource('academic_report', 'AcademicReportResourceController');
    Route::post('/academic_report/destroyAll', 'AcademicReportResourceController@destroyAll')->name('academic_report.destroy_all');

    Route::resource('subsidiary', 'SubsidiaryResourceController');
    Route::post('/subsidiary/destroyAll', 'SubsidiaryResourceController@destroyAll')->name('subsidiary.destroy_all');

    Route::resource('feedback', 'FeedbackResourceController');
    Route::post('/feedback/destroyAll', 'FeedbackResourceController@destroyAll')->name('feedback.destroy_all');


});

Route::group([
    'namespace' => 'Pc',
    'as' => 'pc.',
], function () {
    Route::get('/','HomeController@home')->name('home');

    Route::get('/about/',function (){
        return redirect('/about/chairman');
    })->name('about');

    Route::get('/about/chairman','AboutController@chairman')->name('chairman');
    Route::get('/about/profile','ProfileController@index')->name('profile.index');
    Route::get('/about/profile/{profile}','ProfileController@show')->name('profile.show');
    Route::get('/about/culture','CultureController@index')->name('culture.index');
    Route::get('/about/culture/{culture}','CultureController@show')->name('culture.show');
    Route::get('/about/enterprise_honor','AboutController@enterprise_honor')->name('enterprise_honor');
    Route::get('/about/development_course','AboutController@development_course')->name('development_course');

    Route::get('/course/enterprise_honor','CourseController@enterprise_honor')->name('enterprise_honor');
    Route::get('/course/development_course','CourseController@development_course')->name('development_course');

    Route::get('/news_center',function (){
        return redirect('/news_center/news');
    })->name('news_center');
    Route::get('/news_center/news','NewsController@index')->name('news.index');
    Route::get('/news_center/news/{news}','NewsController@show')->name('news.show');

    Route::get('/news_center/video','VideoController@index')->name('video.index');
    Route::get('/news_center/video/{video}','VideoController@index')->name('video.show');

    Route::get('/scientific',function (){
        return redirect('/scientific/prowess/scientific_research_team');
    })->name('scientific');
    Route::get('/scientific/prowess',function (){
        return redirect('/scientific/prowess/scientific_research_team');
    })->name('scientific.prowess');
    Route::get('/scientific/prowess/scientific_research_team','ScientificController@scientific_research_team')->name('scientific_research_team');
    Route::get('/scientific/prowess/scientific_research_structure','ScientificController@scientific_research_structure')->name('scientific_research_structure');
    Route::get('/scientific/prowess/scientific_research_equipment','ScientificController@scientific_research_equipment')->name('scientific_research_equipment');
    Route::get('/scientific/prowess/joint_research_institute','ScientificController@joint_research_institute')->name('joint_research_institute');

    Route::get('/course/awards_honor','CourseController@awards_honor')->name('awards_honor');

    Route::get('/investor_relations',function (){
        return redirect('/investor_relations/company_information');
    })->name('investor_relations');
    Route::get('/investor_relations/company_information','InvestorRelationController@company_information')->name('company_information');
    Route::get('/investor_relations/company_announcement','InvestorRelationController@company_announcement')->name('company_announcement');
    Route::get('/investor_relations/interactive','InvestorRelationController@interactive')->name('interactive');

    Route::get('/customer_service',function (){
        return redirect('/customer_service/company_information');
    })->name('customer_service');
    Route::get('/customer_service/service_concept','CustomerServiceController@service_concept')->name('service_concept');
    Route::get('/customer_service/service_network','CustomerServiceController@service_network')->name('service_network');
    Route::get('/customer_service/product_information','ProductInformationController@index')->name('product_information');
    Route::get('/customer_service/contact_us','CustomerServiceController@contact_us')->name('contact_us');
    Route::get('/feedback','FeedBackController@index')->name('feedback.index');
    Route::post('/feedback','FeedBackController@store')->name('feedback.store');

    Route::get('/hr',function (){
        return redirect('/hr/join_us');
    })->name('hr');
    Route::get('/hr/join_us','JoinUsController@index')->name('join_us.index');
    Route::get('/hr/join_us/{join_us}','JoinUsController@show')->name('join_us.show');
    Route::get('/hr/talent_system','TalentSystemController@index')->name('talent_system.index');
    Route::get('/hr/talent_system/{talent_system}','TalentSystemController@show')->name('talent_system.show');


    Route::get('/product','ProductController@index')->name('product.index');
    Route::get('/product/{product}','ProductController@show')->name('product.show');

    Route::get('/scientific/academic_report','AcademicReportController@index')->name('academic_report');
    Route::get('/subsidiary','SubsidiaryController@index')->name('subsidiary.index');
    Route::get('/subsidiary/{subsidiary}','SubsidiaryController@show')->name('subsidiary.show');

    Route::get('/anniversary', 'HomeController@anniversary')->name('anniversary');
    Route::get('/thirtieth_anniversary', 'HomeController@thirtiethAnniversary')->name('thirtieth_anniversary');
    Route::get('/thirtieth_anniversary_test', 'HomeController@thirtiethAnniversaryTest')->name('thirtieth_anniversary_test');
    Route::get('/thirtieth_anniversary/course', 'HomeController@thirtiethAnniversaryCourse')->name('thirtieth_anniversary_course');
    Route::get('/en/thirtieth_anniversary', 'HomeController@enThirtiethAnniversary')->name('en_thirtieth_anniversary');
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