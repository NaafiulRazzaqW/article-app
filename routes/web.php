<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('articlePage');
});


//Auth Route
Route::middleware('AuthMiddleware')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');

    //register Route
    Route::post('/registerAccount', [AuthController::class, 'register'])->name('registerAction');
    //Login Route
    Route::post('/loginAccount', [AuthController::class, 'login'])->name('loginAction');
    //Logout Route
    Route::post('/logoutAccount', [AuthController::class, 'logout'])->name('logoutAction')->withoutMiddleware('AuthMiddleware');
});


//ArticleRoute
Route::prefix('article')->group(function () {
    Route::middleware('ArticleMiddleware')->group(function () {
        Route::get('/create', [ArticleController::class, 'createIndex'])->name('createArticlePage');
        Route::post('/createAction', [ArticleController::class, 'store'])->name('createArticleAction');
        Route::get('/edit/{slug}', [ArticleController::class, 'show'])->name('editArticlePage');
        Route::post('/edit/action', [ArticleController::class, 'edit'])->name('editArticleAction');
        Route::delete('/delete', [ArticleController::class, 'delete'])->name('deleteArticle');
        Route::get('/{slug}', [ArticleController::class, 'articleFull'])->name('fullArticlePage');
    });

    Route::get('/', [ArticleController::class, 'index'])->name('articlePage');

});

