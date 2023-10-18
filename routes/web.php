<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\KythiController;
use App\Http\Controllers\ThisinhController;
use App\Http\Controllers\CauhoiController;
use App\Http\Controllers\NoidungbaithiController;
use App\Http\Controllers\LogoutController;

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
/*->middleware('auth');*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['prefix' => ''], function () {
	Route::get('/', [homeController::class, 'index'])->middleware('auth');
	Route::get('/home', [homeController::class, 'index'])->middleware('auth');
});


Route::group(['prefix' => 'baithi'], function () {
	Route::get('noidungbaithi/{id}', [NoidungbaithiController::class, 'create'])->middleware('auth');
	Route::post('noidungbaithi', [NoidungbaithiController::class, 'store'])->middleware('auth');
  Route::get('ketquabaithi/{id}', [NoidungbaithiController::class, 'show'])->middleware('auth');
});

Route::group(['prefix' => 'admin'], function () {
   Route::get('', [adminController::class, 'index'])->middleware('auth');

   Route::group(['prefix' => 'tonghop'], function () {
   	Route::get('', [adminController::class, 'tonghop'])->middleware('auth');
    Route::post('/tonghopketqua', [adminController::class, 'tonghopketqua'])->middleware('auth');
    Route::get('ketquabaithi/{id}', [NoidungbaithiController::class, 'show'])->middleware('auth');
   });

   Route::group(['prefix' => 'kythi'], function () {
    Route::get('', [KythiController::class,  'index'])->middleware('auth');
    Route::get('daxoa', [KythiController::class,  'daxoa'])->middleware('auth');
    Route::get('timkiem', [KythiController::class,  'timkiem'])->middleware('auth');
    Route::get('create', [KythiController::class, 'create'])->middleware('auth');
    Route::post('store', [KythiController::class, 'store'])->middleware('auth');
    Route::get('{id}/show', [KythiController::class, 'show'])->middleware('auth');
    Route::get('{id}/edit', [KythiController::class, 'edit'])->middleware('auth');
    Route::post('{id}/update', [KythiController::class, 'update'])->middleware('auth');
    Route::delete('{id}/delete', [KythiController::class, 'delete'])->middleware('auth');
    Route::get('{id}/restore', [KythiController::class, 'restore'])->middleware('auth');
  });
    
   Route::group(['prefix' => 'cauhoi'], function () {
    Route::get('', [CauhoiController::class,  'index'])->middleware('auth');
    Route::get('daxoa', [CauhoiController::class,  'daxoa'])->middleware('auth');
    Route::get('timkiem', [CauhoiController::class,  'timkiem'])->middleware('auth');
    Route::get('create', [CauhoiController::class, 'create'])->middleware('auth');
    Route::post('store', [CauhoiController::class, 'store'])->middleware('auth');
    Route::get('{id}/show', [CauhoiController::class, 'show'])->middleware('auth');
    Route::get('{id}/edit', [CauhoiController::class, 'edit'])->middleware('auth');
    Route::post('{id}/update', [CauhoiController::class, 'update'])->middleware('auth');
    Route::delete('{id}/delete', [CauhoiController::class, 'delete'])->middleware('auth');
    Route::get('{id}/restore', [CauhoiController::class, 'restore'])->middleware('auth');
	});

   Route::group(['prefix' => 'thisinh'], function () {
    Route::get('', [ThisinhController::class,  'index'])->middleware('auth');
    Route::get('quantri', [ThisinhController::class,  'quantri'])->middleware('auth');
    Route::get('daxoa', [ThisinhController::class,  'daxoa'])->middleware('auth');
    Route::get('timkiem', [ThisinhController::class,  'timkiem'])->middleware('auth');
    Route::get('create', [ThisinhController::class, 'create'])->middleware('auth');
    Route::post('store', [ThisinhController::class, 'store'])->middleware('auth');
    Route::get('{id}/show', [ThisinhController::class, 'show'])->middleware('auth');
    Route::get('{id}/edit', [ThisinhController::class, 'edit'])->middleware('auth');
    Route::post('{id}/update', [ThisinhController::class, 'update'])->middleware('auth');
    Route::delete('{id}/delete', [ThisinhController::class, 'delete'])->middleware('auth');
    Route::get('{id}/restore', [ThisinhController::class, 'restore'])->middleware('auth');
  });
});

Route::get('/logout', [LogoutController::class, 'logout'])->middleware('auth');

Route::get('/test', function() {
  return view('test');
});
