<?php

use Illuminate\Support\Facades\Route;

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

use App\Series;
use App\Services\VimeoAPI;
use Illuminate\Support\Facades\storage;
use Vimeo\Laravel\VimeoManager;

Route::get('/', function (VimeoAPI $api) {
    dd($api->vimeoApi->request('/me/videos?query-obs'));
    dd($api->upload("/videos/query-obs"));
    dd($api->upload('obs-upload-test.mp4'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/series', 'SeriesController');
//Route::get('/series/{series}/{episodeNumber}', 'SeriesController@Episode')->name('series.episode')->middleware

Route::group(['prefix' => 'admin'], function() {

    Route::get('/videos/upload', 'VideoUploadController@create');
    Route::post('/videos/upload', 'VideoUploadController@store')->name('video-upload.store');
});

Route::get('payment', 'PaymentController@payment');
Route::post('subscribe', 'PaymentController@subscribe');