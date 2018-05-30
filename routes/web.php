<?php


/* AUTHENTICATION
---------------------------------------------------------------------------------------*/

//Default Laravel Auth Routes
Auth::routes();

//Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Login Redirects Here
Route::get('/dashboard', 'AdminController@loadUserDashboard');


/* ADMIN | AUTH users only
---------------------------------------------------------------------------------------*/
Route::group(['middleware' => 'admin'], function() {

    //ABOUT US
    Route::get('/dashboard/about-us/',  [
        'as' => 'get_about_us',
        'uses' => 'AdminController@getAboutUpdate'
    ]);

    Route::post('/dashboard/about-us/',  [
        'as' => 'post_about_us',
        'uses' => 'AdminController@postAboutUpdate'
    ]);

    //CONTACT US
    Route::get('/dashboard/contact-us/',  [
        'as' => 'get_contact_us',
        'uses' => 'AdminController@getContactUpdate'
    ]);

    Route::post('/dashboard/contact-us/',  [
        'as' => 'post_contact_us',
        'uses' => 'AdminController@postcontactUpdate'
    ]);

    //NEWS
    Route::get('/dashboard/news/',  [
        'as' => 'get_news',
        'uses' => 'AdminController@getNews'
    ]);

    Route::get('/dashboard/news/new/',  [
        'as' => 'get_news_create',
        'uses' => 'AdminController@getNewsCreate'
    ]);

    Route::get('/dashboard/news/update/{article_id}',  [
        'as' => 'get_news_update',
        'uses' => 'AdminController@getNewsUpdate'
    ]);

    Route::post('/dashboard/news/store/',  [
        'as' => 'post_news_create',
        'uses' => 'AdminController@postNewsCreate'
    ]);

    Route::post('/dashboard/news/update/{article_id}',  [
        'as' => 'post_news_update',
        'uses' => 'AdminController@postNewsUpdate'
    ]);

    Route::post('/dashboard/news/delete/{article_id}',  [
        'as' => 'post_news_delete',
        'uses' => 'AdminController@postNewsDelete'
    ]);

    //TEAM
    Route::get('/dashboard/team/',  [
        'as' => 'get_team',
        'uses' => 'AdminController@getTeam'
    ]);

    Route::get('/dashboard/team/new/',  [
        'as' => 'get_team_create',
        'uses' => 'AdminController@getTeamCreate'
    ]);

    Route::get('/dashboard/team/update/{user_id}',  [
        'as' => 'get_team_update',
        'uses' => 'AdminController@getTeamUpdate'
    ]);

    Route::post('/dashboard/team/new/',  [
        'as' => 'post_team_create',
        'uses' => 'AdminController@postTeamCreate'
    ]);

    Route::post('/dashboard/team/update/{user_id}',  [
        'as' => 'post_team_update',
        'uses' => 'AdminController@postTeamUpdate'
    ]);

    Route::post('/dashboard/team/delete/{user_id}',  [
        'as' => 'post_team_delete',
        'uses' => 'AdminController@postTeamDelete'
    ]);

    //INDUSTRIES
    Route::get('/dashboard/industries/',  [
        'as' => 'get_industries',
        'uses' => 'AdminController@getIndustries'
    ]);

    Route::get('/dashboard/industries/new/',  [
        'as' => 'get_industries_create',
        'uses' => 'AdminController@getIndustriesCreate'
    ]);

    Route::get('/dashboard/industries/update/{id}',  [
        'as' => 'get_industries_update',
        'uses' => 'AdminController@getIndustriesUpdate'
    ]);

    Route::post('/dashboard/industries/new/',  [
        'as' => 'post_industries_create',
        'uses' => 'AdminController@postIndustriesCreate'
    ]);

    Route::post('/dashboard/industries/update/{id}',  [
        'as' => 'post_industries_update',
        'uses' => 'AdminController@postIndustriesUpdate'
    ]);

    Route::post('/dashboard/industries/delete/{ind_id}',  [
        'as' => 'post_indsutries_delete',
        'uses' => 'AdminController@postIndustriesDelete'
    ]);

    //CAREERS
    Route::get('/dashboard/careers/',  [
        'as' => 'get_careers',
        'uses' => 'AdminController@getCareers'
    ]);

    Route::get('/dashboard/careers/new/',  [
        'as' => 'get_careers_create',
        'uses' => 'AdminController@getCareersCreate'
    ]);

    Route::get('/dashboard/careers/update/{id}',  [
        'as' => 'get_careers_update',
        'uses' => 'AdminController@getCareersUpdate'
    ]);

    Route::post('/dashboard/careers/new/',  [
        'as' => 'post_careers_create',
        'uses' => 'AdminController@postCareersCreate'
    ]);

    Route::post('/dashboard/careers/update/{id}',  [
        'as' => 'post_careers_update',
        'uses' => 'AdminController@postCareersUpdate'
    ]);

    Route::post('/dashboard/careers/delete/{ind_id}',  [
        'as' => 'post_careers_delete',
        'uses' => 'AdminController@postCareersDelete'
    ]);

    //SERVICES
    Route::get('/dashboard/services/',  [
        'as' => 'get_services',
        'uses' => 'AdminController@getServices'
    ]);

    Route::get('/dashboard/services/new/',  [
        'as' => 'get_services_create',
        'uses' => 'AdminController@getServicesCreate'
    ]);

    Route::get('/dashboard/services/update/{id}',  [
        'as' => 'get_services_update',
        'uses' => 'AdminController@getServicesUpdate'
    ]);

    Route::post('/dashboard/services/new/',  [
        'as' => 'post_services_create',
        'uses' => 'AdminController@postServicesCreate'
    ]);

    Route::post('/dashboard/services/update/{id}',  [
        'as' => 'post_services_update',
        'uses' => 'AdminController@postServicesUpdate'
    ]);

    Route::post('/dashboard/services/delete/{ind_id}',  [
        'as' => 'post_services_delete',
        'uses' => 'AdminController@postServicesDelete'
    ]);

    //SERVICE CATEGORIES
    Route::get('/dashboard/service-categories/',  [
        'as' => 'get_service_categories',
        'uses' => 'AdminController@getServiceCategories'
    ]);

    Route::get('/dashboard/service-categories/new/',  [
        'as' => 'get_service_categories_create',
        'uses' => 'AdminController@getServiceCategoriesCreate'
    ]);

    Route::get('/dashboard/service-categories/update/{id}',  [
        'as' => 'get_service_categories_update',
        'uses' => 'AdminController@getServiceCategoriesUpdate'
    ]);

    Route::post('/dashboard/service-categories/new/',  [
        'as' => 'post_service_categories_create',
        'uses' => 'AdminController@postServiceCategoriesCreate'
    ]);

    Route::post('/dashboard/service-categories/update/{id}',  [
        'as' => 'post_service_categories_update',
        'uses' => 'AdminController@postServiceCategoriesUpdate'
    ]);

    Route::post('/dashboard/service-categories/delete/{ind_id}',  [
        'as' => 'post_service_categories_delete',
        'uses' => 'AdminController@postServiceCategoriesDelete'
    ]);


    //USEFUL DOCUMENTS
    Route::get('/dashboard/useful-documents/',  [
        'as' => 'get_useful_documents',
        'uses' => 'AdminController@getUsefulDocuments'
    ]);

    Route::get('/dashboard/useful-document/new/',  [
        'as' => 'get_useful_documents_create',
        'uses' => 'AdminController@getUsefulDocumentsCreate'
    ]);

    Route::post('/dashboard/useful-document/new/',  [
        'as' => 'post_useful_documents_create',
        'uses' => 'AdminController@postUsefulDocumentsCreate'
    ]);

    Route::get('/dashboard/download-pdf/{id}',  [
        'as' => 'post_download_pdf',
        'uses' => 'AdminController@postDownloadPDF'
    ]);

    Route::post('/dashboard/useful-documents/delete/{doc_id}',  [
        'as' => 'post_useful_documents_delete',
        'uses' => 'AdminController@postDocumentDelete'
    ]);


});

/* PUBLIC
---------------------------------------------------------------------------------------*/

//Landing Page


//About Us
Route::get('/',  [
    'as' => 'home',
    'uses' => 'PublicController@getWelcome'
]);

//About Us
Route::get('/about-us',  [
    'as' => 'about-us',
    'uses' => 'PublicController@getAbout'
]);

Route::get('/privacy',  [
    'as' => 'privacy',
    'uses' => 'PublicController@getPrivacy'
]);

//Careers
Route::get('/careers-student',  [
    'as' => 'careers-student',
    'uses' => 'PublicController@getCareersStudent'
]);

Route::get('/careers-professional',  [
    'as' => 'careers-prof',
    'uses' => 'PublicController@getCareersProf'
]);

Route::get('/careers-job-descriptions/{id}',  [
    'as' => 'careers-desc',
    'uses' => 'PublicController@getCareersDesc'
]);

//Contact
Route::get('/contact',  [
    'as' => 'contact',
    'uses' => 'PublicController@getContact'
]);

//Industries
Route::get('/industries',  [
    'as' => 'industries',
    'uses' => 'PublicController@getIndustries'
]);

//Services Slider
Route::get('/industries/{title}/{link}',  [
    'as' => 'get_industries_slider',
    'uses' => 'PublicController@getIndustriesSlider'
]);


//News
Route::get('/news',  [
    'as' => 'news',
    'uses' => 'PublicController@getNews'
]);

//News Single (DUMMY)
Route::get('/news/{title}/{id}',  [
    'as' => 'news-single',
    'uses' => 'PublicController@getNewsSingle'
]);

//Services
Route::get('/services',  [
    'as' => 'services_home',
    'uses' => 'PublicController@getServices'
]);

//Services Slider
Route::get('/services/{title}/{key}',  [
    'as' => 'get_service_slider',
    'uses' => 'PublicController@getServicesSlider'
]);

//Contact Us
Route::get('/contact-us',  [
    'as' => 'contact-us',
    'uses' => 'PublicController@getContact'
]);

//Send Mail Professional
Route::post('/send-mail-career',  [
    'as' => 'send_mail_career',
    'uses' => 'ContactController@careerPost'
]);

//Send Mail Professional
Route::post('/send-mail',  [
    'as' => 'main_contact',
    'uses' => 'ContactController@contact'
]);

//Useful Documents
Route::get('/useful-documents',  [
    'as' => 'useful-documents',
    'uses' => 'PublicController@getUsefulDocuments'
]);


Route::get('/dashboard/download-pdf/{id}',  [
    'as' => 'post_download_pdf',
    'uses' => 'PublicController@postDownloadPDF'
]);

Route::post('/dashboard/useful-documents/delete/{doc_id}',  [
    'as' => 'post_useful_documents_delete',
    'uses' => 'PublicController@postDocumentDelete'
]);

//CAP APP
Route::get('/cap-app',  [
    'as' => 'cap_app',
    'uses' => 'PublicController@getCapApp'
]);
