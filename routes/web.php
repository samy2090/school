<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){ 

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/custom/livewire/update', $handle);
        });

        Route::group(['prefix'=>'/dashboard'], function () {

            Route::view('/counter','dashboard.counterPage');

            
            Route::view('/','dashboard.layouts.new_page')->name('home');
            Route::resource('/grades','App\Http\Controllers\GradeController');
            Route::resource('/sections','App\Http\Controllers\SectionController');
            Route::view('/addParents','dashboard.addParents')->name('addParents');


            Route::group(['prefix'=>'/classrooms'], function () {
                Route::resource('classrooms','App\Http\Controllers\ClassRoomController');
                Route::get('getGrade/{Grade_id}','App\Http\Controllers\SectionController@getClass');
                Route::post('delete_all','App\Http\Controllers\ClassRoomController@deleteAll')->name('classroom_deleteAll');
                Route::post('classroom_filter','App\Http\Controllers\ClassRoomController@classroomFilter')->name('classroom_filter');
            });


        });
    });