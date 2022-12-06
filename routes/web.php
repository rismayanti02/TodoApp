<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
Route::middleware('isGuest')->group(function() {
    Route::get('/', [TodoController::class,'index']);
    Route::post('/login',[LoginController::class,'login'])->name('login-baru');
    Route::get('/register',[TodoController::class,'register']);
    Route::post('/register',[RegisterController::class,'register']);
});
Route::middleware('isLogin')->group (function () {
    Route::get('/dashboard', [TodoController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/data', [TodoController::class, 'data'])->name('data');
// path yang ada {}artinya path dinamis,path dinamis merupakan path yang datanya diisi dari databes,path dinamis ini nantinya akan berubah ubah tergantung data yang diberikan apabila dalem routenya ada path dinamis maka nantinya data path dinmais ini dpat diakses oleh contteoller

    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
    //  method route buat update data kedatabes itu pake patch/put
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
//method route buat delete data didatabase itu pke delete


Route::delete('/destroy/{id}', [TodoController::class, 'destroy'])->name('destroy');
Route::patch('/complated/{id}', [TodoController::class,'UpdateToComplated'])->name('update-complated');

});




Route::get('/',[TodoController::class,'index'])->middleware('guest')->name('login');


// logout
Route::get('/Logout',[LoginController::class,'Logout'])->name('logout');


