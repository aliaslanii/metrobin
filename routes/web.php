<?php

use App\Http\Controllers\AdminActorController;
use App\Http\Controllers\AdminAgesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCountryController;
use App\Http\Controllers\AdminDirectorController;
use App\Http\Controllers\AdminGenreController;
use App\Http\Controllers\AdminLangController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeMovieController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class,'index'])->name('home');
Route::prefix('Movie')->group(function(){
    Route::get('Show/{Movieid}', [HomeMovieController::class,'showMovie'])->name('ShowMovie');
    Route::get('Favorite', [HomeMovieController::class,'favoriteMovie'])->name('FavoriteMovie');
    Route::get('New', [HomeMovieController::class,'newMovies'])->name('NewMovies');
    Route::get('Hot', [HomeMovieController::class,'hotMovies'])->name('HotMovies');
    Route::get('Genre/{id}', [HomeMovieController::class,'genreMovie'])->name('GenreMovie');
    Route::get('Find/{Type}/{id}', [HomeMovieController::class,'findMovie'])->name('FindMovie');
    Route::get('Search', [HomeMovieController::class,'searchMovie'])->name('SearchMovie');
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('Admin');

    Route::prefix('Genre')->group(function(){
        Route::get('/', [AdminGenreController::class,'genre'])->name('Genre');
        Route::post('insert',[AdminGenreController::class,'genreinsert'])->name('Genreinsert');
        Route::post('Edite',[AdminGenreController::class,'genreEdite'])->name('GenreEdite');
        Route::post('Update',[AdminGenreController::class,'genreUpdate'])->name('GenreUpdate');
        Route::post('Delete',[AdminGenreController::class,'genreDelete'])->name('GenreDelete');
    });
    Route::prefix('Lang')->group(function(){
        Route::get('/', [AdminLangController::class,'lang'])->name('Lang');
        Route::post('insert',[AdminLangController::class,'langinsert'])->name('Langinsert');
        Route::post('Edite',[AdminLangController::class,'langEdite'])->name('LangEdite');
        Route::post('Update',[AdminLangController::class,'langUpdate'])->name('LangUpdate');
        Route::post('Delete',[AdminLangController::class,'langDelete'])->name('LangDelete');
    });
    Route::prefix('Actor')->group(function(){
        Route::get('/', [AdminActorController::class,'actor'])->name('Actor');
        Route::post('insert',[AdminActorController::class,'actorinsert'])->name('Actorinsert');
        Route::post('Edite',[AdminActorController::class,'actorEdite'])->name('ActorEdite');
        Route::post('Update',[AdminActorController::class,'actorUpdate'])->name('ActorUpdate');
        Route::post('Delete',[AdminActorController::class,'actorDelete'])->name('ActorDelete');
    });
    Route::prefix('Director')->group(function(){
        Route::get('/', [AdminDirectorController::class,'director'])->name('Director');
        Route::post('insert',[AdminDirectorController::class,'directorinsert'])->name('Directorinsert');
        Route::post('Edite',[AdminDirectorController::class,'directorEdite'])->name('DirectorEdite');
        Route::post('Update',[AdminDirectorController::class,'directorUpdate'])->name('DirectorUpdate');
        Route::post('Delete',[AdminDirectorController::class,'directorDelete'])->name('DirectorDelete');
    });
    Route::prefix('Country')->group(function(){
        Route::get('/', [AdminCountryController::class,'country'])->name('Country');
        Route::post('insert',[AdminCountryController::class,'countryinsert'])->name('Countryinsert');
        Route::post('Edite',[AdminCountryController::class,'countryEdite'])->name('CountryEdite');
        Route::post('Update',[AdminCountryController::class,'countryUpdate'])->name('CountryUpdate');
        Route::post('Delete',[AdminCountryController::class,'countryDelete'])->name('CountryDelete');
    });
    Route::prefix('Ages')->group(function(){
        Route::get('/', [AdminAgesController::class,'ages'])->name('Ages');
        Route::post('insert',[AdminAgesController::class,'agesinsert'])->name('Agesinsert');
        Route::post('Edite',[AdminAgesController::class,'agesEdite'])->name('AgesEdite');
        Route::post('Update',[AdminAgesController::class,'agesUpdate'])->name('AgesUpdate');
        Route::post('Delete',[AdminAgesController::class,'agesDelete'])->name('AgesDelete');
    });
    Route::prefix('Movie')->group(function(){
        Route::get('/', [AdminMovieController::class,'movie'])->name('Movie');
        Route::get('Create',[AdminMovieController::class,'movieCreate'])->name('MovieCreate');
        Route::post('insert',[AdminMovieController::class,'movieinsert'])->name('Movieinsert');
        Route::post('Edite',[AdminMovieController::class,'movieEdite'])->name('MovieEdite');
        Route::post('Update',[AdminMovieController::class,'movieUpdate'])->name('MovieUpdate');
        Route::post('Delete',[AdminMovieController::class,'movieDelete'])->name('MovieDelete');
    });
    Route::prefix('temp')->group(function(){
        Route::post('upload/Movie/Video',[AdminMovieController::class,'tempuploadMovie']);
        Route::delete('delete/Movie/Video',[AdminMovieController::class,'tempdeleteMovie']);
    });
});
Auth::routes();
Route::get('logout',[AuthController::class,'logout'])->name('logout');