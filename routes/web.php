<?php

use App\Http\Controllers\BackEnd\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\BackEnd\Dashboard;
// use App\Http\Middleware\UserAthenticate;
// use App\Http\Kernel;


Route::prefix('/')->group(function () {
    //home
    Route::get('/',[HomeController::class, "index"])->name('home');

    //categori
    Route::get('categori',[HomeController::class, "show_categori"])->name('categori');

    //anime details , watching
    Route::get('anime/detail',[HomeController::class, "show_anime_detail"])->name('anime-detail');
    Route::get('anime/watching',[HomeController::class, "show_anime_watch"])->name('anime-watching');

    //blog
    Route::get('blog',[HomeController::class, "show_blog"])->name('blog');
    Route::get('blog/detail',[HomeController::class, "show_blog_detail"])->name('blog-detail');

    //login
    Route::get('login',[HomeController::class, "login"])->name('login');
    Route::post('login',[HomeController::class, "hendln_login"])->name('login');

    //logout
    Route::get('logout',[HomeController::class, "logout"])->name('logout');

    //sign up
    Route::get('register',[HomeController::class, "register"])->name('register');
    Route::post('register',[HomeController::class, "hendln_register"])->name('register');

    //contact
    Route::get('contact',[HomeController::class, "show_contact"])->name('contact');

    //comment
    Route::post("comments",[CommentController::class, "create"])->name("create-comment");
});

//back end

Route::prefix("admin")->middleware("user")->group(function(){
    Route::get('/',[Dashboard::class, "index"]);
});
