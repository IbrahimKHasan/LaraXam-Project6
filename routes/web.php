<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DashController;
use App\Models\Exam;
use App\Models\User;

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

################## For Admin #############################
Route::name('admin.')->prefix('admin')->middleware('auth','user')->group(function () {
	Route::resource("manage-users", UserController::class);
    Route::resource("manage-exams", ExamController::class);
    Route::resource("manage-questions", QuestionController::class);
    Route::resource("manage-answers", AnswerController::class);
    Route::resource("", DashController::class);
});

// Route::get('/admin', function () {
//     return view('admin.main');
// })->name('main')->middleware('auth','user');

################## For Public #############################
Route::resource("/laraxam", LandingController::class);
Route::resource("/profile", UserProfileController::class);
Route::get('/', function () {
    $exams=Exam::all();
    return redirect('/laraxam')->with('exams',$exams);
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

