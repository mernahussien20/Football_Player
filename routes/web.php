<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
  use App\Http\Controllers\FrontController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\FrontController::class, 'home'])->name('fronthome');

// //front players
Route::get('/RollmentOfplay', [App\Http\Controllers\PlayerController::class, 'create'])->name('players.create');
Route::post('/players/store', [App\Http\Controllers\PlayerController::class, 'store'])->name('players.store');

Route::get('/inquire', [App\Http\Controllers\FrontController::class, 'inquiry'])->name('inquirys');
Route::post('/Show_Of_inquire', [App\Http\Controllers\FrontController::class, 'inquireShow'])->name('inquire.show');
// Route::get('/next-exam/{player_id}/{current_exam_id}', [App\Http\Controllers\ExamController::class, 'showNextExam'])->name('next.exam');

Route::post('/get-next-exam', [App\Http\Controllers\FrontController::class, 'getNextExam'])->name('getNextExam');

Auth::routes();


/*
All Admin Routes List
*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/players/show/{id}', [App\Http\Controllers\PlayerController::class, 'show'])->name('players.show');
    Route::delete('/players/destroy/{id}', [App\Http\Controllers\PlayerController::class, 'destroy'])->name('players.destroy');
    Route::delete('/finaldestroy/{id}', [App\Http\Controllers\PlayerController::class, 'finalDestroy'])->name('finaldestroy');
    Route::put('/players/update/{id}', [App\Http\Controllers\PlayerController::class, 'update'])->name('players.update');
    Route::get('/player/edit/{id}', [App\Http\Controllers\PlayerController::class, 'edit'])->name('players.edit');
    Route::get('footballPlayers', [App\Http\Controllers\PlayerController::class, 'index'])->name('players.index');
    Route::get('/Failplayers', [App\Http\Controllers\FailController::class, 'index'])->name('failPlayers');
     Route::post('/players/filter', [App\Http\Controllers\PlayerController::class, 'filter'])->name('players.filter');
     
     Route::get('/restore_player/{id}', [App\Http\Controllers\FailController::class, 'Restore_Player'])->name('Restore_Player');

    // exams routes
    Route::get('/exams', [App\Http\Controllers\ExamController::class, 'index'])->name('exams.index');
    Route::get('/exams/create', [App\Http\Controllers\ExamController::class, 'create'])->name('exams.create');
    Route::post('/exams/store', [App\Http\Controllers\ExamController::class, 'store'])->name('exams.store');
    Route::get('/exams/edit/{id}', [App\Http\Controllers\ExamController::class, 'edit'])->name('exams.edit');
    Route::put('/exams/update/{id}', [App\Http\Controllers\ExamController::class, 'update'])->name('exams.update');
    Route::delete('/exams/{id}', [App\Http\Controllers\ExamController::class, 'destroy'])->name('exams.destroy');
    Route::get('/exams/show/{id}', [App\Http\Controllers\ExamController::class, 'show'])->name('exam.show');

     // roles routes
     Route::get('/roles', [App\Http\Controllers\PlayerRoleController ::class, 'index'])->name('roles.index');
     Route::get('/roles/create', [App\Http\Controllers\PlayerRoleController ::class, 'create'])->name('roles.create');
     Route::post('/roles/store', [App\Http\Controllers\PlayerRoleController ::class, 'store'])->name('roles.store');
     Route::get('/roles/edit/{id}', [App\Http\Controllers\PlayerRoleController ::class, 'edit'])->name('roles.edit');
     Route::put('/roles/update/{id}', [App\Http\Controllers\PlayerRoleController ::class, 'update'])->name('roles.update');
     Route::delete('/roles/{id}', [App\Http\Controllers\PlayerRoleController ::class, 'destroy'])->name('roles.destroy');

 // roles routes
 Route::get('/dates', [App\Http\Controllers\DatesController ::class, 'index'])->name('dates.index');
 Route::get('/dates/create', [App\Http\Controllers\DatesController ::class, 'create'])->name('dates.create');
 Route::post('/dates/store', [App\Http\Controllers\DatesController ::class, 'store'])->name('dates.store');
 Route::get('/dates/edit/{id}', [App\Http\Controllers\DatesController ::class, 'edit'])->name('dates.edit');
 Route::put('/dates/update/{id}', [App\Http\Controllers\DatesController ::class, 'update'])->name('dates.update');
 Route::delete('/dates/{id}', [App\Http\Controllers\DatesController ::class, 'destroy'])->name('dates.destroy');

// roles routes
Route::get('/branches', [App\Http\Controllers\BranchController ::class, 'index'])->name('branches.index');
Route::get('/branches/create', [App\Http\Controllers\BranchController ::class, 'create'])->name('branches.create');
Route::post('/branches/store', [App\Http\Controllers\BranchController ::class, 'store'])->name('branches.store');
Route::get('/branches/edit/{id}', [App\Http\Controllers\BranchController ::class, 'edit'])->name('branches.edit');
Route::put('/branches/update/{id}', [App\Http\Controllers\BranchController ::class, 'update'])->name('branches.update');
Route::delete('/branches/{id}', [App\Http\Controllers\BranchController ::class, 'destroy'])->name('branches.destroy');


  // exams routes
  Route::post('/results/store', [App\Http\Controllers\ExamController::class, 'storeExam'])->name('results.store');


  // filters routes
//   Route::post('/RolesFilter', [App\Http\Controllers\PlayerRoleController::class, 'Roles_Show'])->name('roles.show');
//   Route::post('/BirtsFilter', [App\Http\Controllers\PlayerRoleController::class, 'Births_Show'])->name('births.show');
//   Route::post('/GovernorateFilter', [App\Http\Controllers\PlayerRoleController::class, 'governorates_Show'])->name('governorate.show');




});


Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
