<?php
//Backend
Route::group(['prefix' => 'system','middleware'=>['auth','role','log','permission:'.basename(request()->path())]], function () {

    Route::get('log/pages/Exception-logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::group(['namespace' => 'Admin' ], function () {
        Route::get('list', 'templates\listController@index');
        Route::resource('form', 'templates\formController');

        Route::get('/home',
            ['uses'=>'home\homeController@index',
                'section'=>'Dashboard']);
        Route::get('log/pages/Exception-logs', 'log\LogViewerController@index');
        Route::resource('log', 'log\logController');


        Route::resource('settings', 'config\settingsController');
        Route::put('settings', 'config\settingsController@updateAll');
        Route::delete('settings/destroyImage/{id}','config\settingsController@delImage');

        Route::resource('email', 'config\emailController');

        Route::get('/user/password/{id}','users\usersController@password');
        Route::post('/user/update_password/{id}','users\usersController@updatepassword');
        Route::resource('user', 'users\usersController', [
            'except' => [ 'show' ]
        ]);
        Route::resource('role', 'users\rolesController', [
            'except' => [ 'show' ]
        ]);

        Route::resource('audit', 'audit\AuditController');
        Route::get('LogViewer','log\LogViewerController@index');
        Route::get('/login_logs','log\LoginLogController@index');

        Route::get('password/updatepassword','password\passwordController@index');


        Route::get('/password/change_password/{id}',
            ['uses'=>'password\passwordController@changePassword',
                'section'=>'Change Password']);
        Route::post('/user/change_password/{id}','password\passwordController@updatePassword');
        Route::post('/change_language','config\settingsController@store');

//        Route::get('/language','config\languageController@index');

		// language route
		Route::get('/langcategory/{id}/manageLanguage', 'language\langcategoryController@manageLanguage');
		Route::post('/langcategory/{id}/manageLanguage', 'language\langcategoryController@postManageLang');
		Route::get('/langcategory/{id}/defaultLanguage', 'language\langcategoryController@defaultLanguage');
		Route::post('/langcategory/{id}/defaultLanguage', 'language\langcategoryController@postDefaultLang');
		Route::get('/langcategory/default/{langId}', 'language\langcategoryController@getDefaultLang');
		Route::resource('langcategory', 'language\langcategoryController', [
            'except' => [ 'show' ]
        ]);
		Route::resource('languages', 'language\languagesController', [
            'except' => [ 'show' ]
        ]);
		Route::resource('words', 'language\wordsController', [
            'except' => [ 'show' ]
        ]);
		Route::post('/translation/updateTranslation', 'language\translationController@updateTranslation');
		Route::resource('translation', 'language\translationController', ['only' => ['index', 'create', 'store', 'destroy']]);

		Route::resource('/apiusers', 'apiusers\ApiUsersController');
        Route::resource('/news', 'news\NewsController');
        Route::resource('/pages', 'pages\pagesController');



//		Route::get('page/status', 'page\pageController@status');
//

		 Route::resource('page', 'page\pageController', [
            'except' => [ 'show' ]
        ]);
		// Route::get('page/status/{id}', 'page\pageController@Status');

		/*gallery routes */
//		Route::get('gallery', 'gallery\galleryController@index');
//		Route::get('gallery/create', 'gallery\galleryController@create');
//		Route::post('gallery/store', 'gallery\galleryController@store');
//		Route::get('gallery/edit', 'gallery\galleryController@edit');
//		Route::post('gallery/update', 'gallery\galleryController@update');
//		Route::delete('gallery/destroy', 'gallery\galleryController@destroy');
//		Route::get('gallery/status', 'gallery\galleryController@status');
//		Route::get('gallery/pages/photo', 'gallery\photoController@index');

		/*photo routes */
//		Route::get('photo', 'gallery\photoController@index');
//		Route::get('photo/create', 'gallery\photoController@create');
//		Route::post('gallery/pages/photo/store', 'gallery\photoController@store');
//		Route::get('gallery/pages/photo/edit', 'gallery\photoController@edit');
//		Route::post('photo/update', 'gallery\photoController@update');
//		Route::delete('gallery/pages/photo/destroy', 'gallery\photoController@destroy');
//		Route::get('gallery/pages/photo/status', 'gallery\photoController@status');

        Route::resource('profile', 'profile\profileController');
        Route::post('global_setting', 'profile\profileController@globalSetting');

	});

});
