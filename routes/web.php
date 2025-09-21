<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    //projects resource
    Route::resource('project', ProjectController::class);
    Route::resource('task', TaskController::class);
    Route::resource('label', LabelController::class);
});

// Route::prefix('projects')->controller([ProjectController::class])->middleware(['auth', 'verified'])->group(function () {
//     Route::get('/', 'index')->name('projects');
// });





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';





Route::get("change_lang", function(){
    $lang = App::getLocale();
    if($lang == "ar"){
        App::setLocale("en");
        session(['locale' => 'en']);
    } else {
        App::setLocale("ar");
        session(['locale' => 'ar']);
    }
    return redirect()->back();
})->name('change_lang');












