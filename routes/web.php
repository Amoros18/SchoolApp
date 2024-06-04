<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::prefix('')->name('auth.')->group(function(){
    Route::get('/login',[UserController::class, 'login'])->name('login');
    Route::post('/login',[UserController::class, 'dologin']);
    Route::delete('/logout',[UserController::class, 'logout'])->name('logout');
});

Route::prefix('user/')->name('user.')->middleware('auth')->group(function(){
    Route::get('/',[UserController::class,'list'])->name('list');
    Route::get('create', [UserController::class,'createUser'])->name('create');
    Route::post('create', [UserController::class,'create_user']);
    Route::get('update/{table}', [UserController::class,'updateUser'])->name('update');
    Route::post('update/{table}', [UserController::class,'update_user']);
    Route::get('delete/{table}',[UserController::class,'deleteUser'])->name('delete');
    Route::get('search/{table}',[UserController::class,'search'])->name('search');
});

Route::prefix('inscription')->middleware('auth')->group(function(){
    Route::prefix('eleves')->name('eleve.')->group(function(){
        Route::get('/', [EleveController::class,'index'])->name('accueil');
        Route::get('/creat-eleves',[EleveController::class,'createEleve'])->name('create');
        Route::post('/creat-eleves',[EleveController::class,'create_eleve']);
        Route::get('/update/{table}',[EleveController::class,'updateEleve'])->name('update');
        Route::post('/update/{table}',[EleveController::class,'update_eleve']);
        Route::get('/delete/{table}',[EleveController::class,'deleteEleve'])->name('delete');
        Route::get('search/{table}',[EleveController::class,'affiche_eleve'])->name('search');
    });
    Route::prefix('enseignant')->name('enseignant.')->group(function(){
        Route::get('/', [EnseignantController::class,'index'])->name('accueil');
        Route::get('create',[EnseignantController::class,'createEnseignant'])->name('create');
        Route::post('create',[EnseignantController::class,'create_enseignant']);
        Route::get('update/{table}',[EnseignantController::class,'updateEnseignant'])->name('update');
        Route::post('update/{table}',[EnseignantController::class,'update_enseignant']);
        Route::get('delete/{table}',[EnseignantController::class,'deleteEnseignant'])->name('delete');
        Route::get('search/{table}',[EnseignantController::class,'afficheEnseignant'])->name('search');
    });

});