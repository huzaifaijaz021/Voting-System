<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PollController;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

//For Voter
Route::get('/votelist{id}',[PollController::class,'votelist'])->name('votelist');
Route::post('/voteuser',[PollController::class,'voteuser'])->name('voteuser');
Route::get('/resultshow{id}',[PollController::class,'resultshow'])->name('resultshow');

//For Admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/list',[PollController::class,'list'])->name('list');
    Route::get('/create',[PollController::class,'create'])->name('create');
    Route::post('/store',[PollController::class,'store'])->name('store');
    Route::get('/edit{id}',[PollController::class,'edit'])->name('edit');
    Route::get('/show{id}',[PollController::class,'show'])->name('show');
    Route::post('/update{id}',[PollController::class,'update'])->name('update');
    Route::get('/delete{id}',[PollController::class,'destroy'])->name('delete');
    Route::get('/userdata',[PollController::class,'userdata'])->name('userdata');
 
});