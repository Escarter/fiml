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

Route::get('/', function () {
    return view('welcome');
});

//Authentication routes

Auth::routes();
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/downloadform', function () {
    return view('admins.downloadform');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/dashboard', ['as' => 'users-dashboard', 'uses' => 'UserController@getDashboard']);

    //Get Training Content
    Route::get('/training-content/{tag}', ['as' => 'training-content', 'uses' => 'UserController@getTrainingContent']);

    //Get Downloadable content
    Route::get('/downloadable-content/{type}', ['as' => 'downloadable-content', 'uses' => 'UserController@getDownloadContent']);

    //Download file
    Route::get('/download-file/{id}', ['as' => '/download-file', 'uses' => 'UserController@downloadFile']);

    // Manage Likes
    Route::get('/training-content/like/{id}', ['as' => 'training-content.like', 'uses' => 'LikeController@likeTrainingContent']);
    Route::get('/downloadable-content/like/{id}', ['as' => 'downloadable-content.like', 'uses' => 'LikeController@likeDownload']);

    Route::get('/pricing', ['as' => 'billing-process', 'uses' => 'BillingController@index']);
    Route::get('/chart/{plan_id}', ['as' => 'chart-processing', 'uses' => 'BillingController@chart']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', ['as' => 'admin-dashboard', 'uses' => 'AdminController@getDashboard']);

    //Users Management
    Route::get('/users-management', ['as' => 'users-management', 'uses' => 'AdminController@getUsersManagement']);
    Route::post('/create-user', ['as' => 'create-user', 'uses' => 'AdminController@storeNewUser']);
    Route::get('/edit-user/{id}', ['as' => 'edit-user', 'uses' => 'AdminController@editUser']);
    Route::post('/update-user', ['as' => 'update-user', 'uses' => 'AdminController@updateUser']);
    Route::get('/delete-user/{id}', ['as' => 'delete-user', 'uses' => 'AdminController@deleteUser']);

    //Training Content Management
    Route::get('/training-content-management', ['as' => 'training-content-management', 'uses' => 'TrainingContentController@getTrainingContentManagement']);
    Route::post('/create-training-content', ['as' => 'create-training-content', 'uses' => 'TrainingContentController@createTrainingContent']);
    Route::get('/edit-training-content/{id}', ['as' => 'edit-training-content', 'uses' => 'TrainingContentController@editTrainingContent']);
    Route::post('/update-training-content', ['as' => 'update-training-content', 'uses' => 'TrainingContentController@updateTrainingContent']);
    Route::get('/delete-training-content/{id}', ['as' => 'delete-training-content', 'uses' => 'TrainingContentController@deleteTrainingContent']);

    //Download Content Management
    Route::get('/download-content-management', ['as' => 'download-content-management', 'uses' => 'DownloadController@getDownloadContentManagement']);
    Route::post('/create-download-content', ['as' => 'create-download-content', 'uses' => 'DownloadController@createDownloadContent']);
    Route::get('/edit-download-content/{id}', ['as' => 'edit-download-content', 'uses' => 'DownloadController@editDownloadContent']);
    Route::post('/update-download-content', ['as' => 'update-download-content', 'uses' => 'DownloadController@updateDownloadContent']);
    Route::get('/delete-download-content/{id}', ['as' => 'delete-download-content', 'uses' => 'DownloadController@deleteDownloadContent']);
});
