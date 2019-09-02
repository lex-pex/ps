<?php

Route::group(['prefix' => '/', 'middleware' => ['counter', 'web']], function () {

Auth::routes();

Route::get('/', 'PageController@index');
Route::get('/sitemap', 'PageController@sitemap')->name('sitemap');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contacts', 'PageController@contacts')->name('contacts');
Route::post('/feedback', 'PageController@feedback')->name('feedback');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {

    Route::get('/testing_draft_admin', 'TestingDraftController@testing_draft')->name('Testing_Draft');

    Route::get('/', 'Admin\ListController@pane');

    Route::get('/path', 'Admin\PathController@path');
    Route::get('/path/{part}', 'Admin\PathController@part');
    Route::get('/path/{part}/{category}', 'Admin\PathController@category');
    Route::get('/path/{part}/{category}/{rubric}', 'Admin\PathController@rubric');
    Route::get('/path/{part}/{category}/{rubric}/{lesson}', 'Admin\PathController@lesson');

    Route::get('/parts', 'Admin\ListController@partsList');
    Route::get('/cats', 'Admin\ListController@catsList');
    Route::get('/rubrics', 'Admin\ListController@rubricsList');
    Route::get('/lessons', 'Admin\ListController@lessonsList');
    Route::get('/ads', 'Admin\ListController@adsList');
    Route::get('/menu_ads', 'Admin\ListController@menuAdsList');
    Route::get('/feedback', 'Admin\ListController@feedback');

    Route::get('/{type}/add', 'Admin\AddController@add');

    Route::post('/{type}/save/', 'Admin\AddController@itemSave')->name('itemSave');

    Route::get('/part/edit/{id}', 'Admin\EditController@partEdit');
    Route::get('/category/edit/{id}', 'Admin\EditController@categoryEdit');
    Route::get('/rubric/edit/{id}', 'Admin\EditController@rubricEdit');
    Route::get('/lesson/edit/{id}', 'Admin\EditController@lessonEdit');
    Route::get('/ad/edit/{id}', 'Admin\EditController@adEdit');
    Route::get('/menu_ad/edit/{id}', 'Admin\EditController@menuAdEdit');

    Route::post('/part/store/{item}', 'Admin\EditController@partStore')->name('partStore');
    Route::post('/category/store/{item}', 'Admin\EditController@categoryStore')->name('categoryStore');
    Route::post('/rubric/store/{item}', 'Admin\EditController@rubricStore')->name('rubricStore');
    Route::post('/lesson/store/{item}', 'Admin\EditController@lessonStore')->name('lessonStore');
    Route::post('/ad/store/{item}', 'Admin\EditController@adStore')->name('adStore');
    Route::post('/menu_ad/store/{item}', 'Admin\EditController@menuAdStore')->name('menu_adStore');

    Route::get('/part/preview/{id}', 'Admin\PreviewController@partPreview');
    Route::get('/category/preview/{id}', 'Admin\PreviewController@categoryPreview');
    Route::get('/rubric/preview/{id}', 'Admin\PreviewController@rubricPreview');
    Route::get('/lesson/preview/{id}', 'Admin\PreviewController@lessonPreview');
    Route::get('/ad/preview/{id}', 'Admin\PreviewController@adPreview');
    Route::get('/menu_ad/preview/{id}', 'Admin\PreviewController@menuAdPreview');
    Route::get('/feedback/read/{id}', 'Admin\PreviewController@readFeedback');

    Route::post('/part/del/{item}', 'Admin\DelController@partDel')->name('partDel');
    Route::post('/category/del/{item}', 'Admin\DelController@categoryDel')->name('categoryDel');
    Route::post('/rubric/del/{item}', 'Admin\DelController@rubricDel')->name('rubricDel');
    Route::post('/lesson/del/{item}', 'Admin\DelController@lessonDel')->name('lessonDel');
    Route::post('/ad/del/{item}', 'Admin\DelController@adDel')->name('adDel');
    Route::post('/menu_ad/del/{item}', 'Admin\DelController@adDel')->name('menu_adDel');
    Route::post('/feedback/del/{item}', 'Admin\DelController@feedbackDel')->name('feedbackDel');

});

    Route::get('{part}', 'CellController@part');
    Route::get('{part}/{category}', 'CellController@category');
    Route::get('{part}/{category}/{rubric}', 'CellController@rubric');
    Route::get('{part}/{category}/{rubric}/{lesson}', 'CellController@lesson');

});
