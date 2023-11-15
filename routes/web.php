<?php

use App\Http\Controllers\BackEnd\BannerController;
use App\Http\Controllers\BackEnd\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\BackEnd\Dashboard;
use App\Http\Controllers\BackEnd\FilmController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\CategoryController;
// use GuzzleHttp\Middleware;

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
    Route::post('search',[FilmController::class, "search"])->name('search');

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
    Route::get('comments',[CommentController::class, "index"])->name("all_comments");
    Route::get('add_comment',[CommentController::class, "create"])->Middleware("user")->name("add_comment");
});

//back end

Route::prefix("admin")->middleware("user")->group(function(){
    Route::get('/',[Dashboard::class, "index"])->name("admin");

    //banner
    Route::get('banner',[BannerController::class, "index"])->name("banner");
    Route::get('delete_banner',[BannerController::class, "delete"])->name("delete_banner");
    Route::post('add_banner',[BannerController::class, "create"])->name('add_banner');
    Route::get('edit_banner',[BannerController::class, "edit"])->name("edit_banner");

    //category
    Route::get('category',[CategoryController::class, "index"])->name("category");
    Route::get('add_category',[CategoryController::class, "create"])->name("add_category");
    Route::post('add_category',[CategoryController::class, "hendln_create"])->name("add_category");
    Route::get('fix_category',[CategoryController::class, "edit"])->name("fix_category");
    Route::get('delete_category',[CategoryController::class, "destroy"])->name("delete_category");

    //comment
    Route::get('admin_comment',[CommentController::class, "admin_index"])->name("admin_all_comments");

    //film
    Route::get('film',[FilmController::class, "index"])->name("film");
    Route::get('add_film',[FilmController::class, "create"])->name("add_film");
    Route::post('add_film',[FilmController::class, "hendln_create"])->name("add_film");
    Route::get('edit_film',[FilmController::class, "index"])->name("edit_film");
    Route::get('delete_film',[FilmController::class, "index"])->name("delete_film");
    //user
    Route::get('user',[UserController::class, "index"])->name("users");
    Route::get('add_user',[UserController::class, "index"])->name("add_users");
    Route::get('edit_user',[UserController::class, "index"])->name("edit_users");
    Route::get('delete_user',[UserController::class, "index"])->name("delete_users");
});
