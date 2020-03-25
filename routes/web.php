<?php

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

use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::namespace('Post')->group(function() {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/post/{id}', 'PostController@show')->name('show.post');
    Route::get('/create-post', 'PostController@create')->name('create.post');
    Route::post('/create-post', 'PostController@store')->name('store.post');
    Route::post('/post/like/{id}', 'PostController@like')->name('like.post');
    Route::post('/post/{id}', 'ReplyPostController@store')->name('store.reply-post');
});

// Administration
Route::namespace('Admin')->group(function() {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
});

// Article
Route::namespace('Article')->group(function() {

    // CRUD des articles
    Route::resource('/article', 'ArticleController', [])->except(['index', 'show']);
    Route::get('/article/{id}/edit', 'ArticleController@edit')->name('article.edit');
    Route::get('/articles', 'ArticleController@index')->name('article.index');
    Route::get('/article/{id}/{slug}', 'ArticleController@show')->name('article.show');

    // Création des CRUD d'administration
    Route::name('admin.')->group(function () {
        Route::resource('admin/subcategory', 'SubCategoryController', [
            'prefix' => 'admin.'
        ])->except(['index', 'show']);
        Route::resource('admin/category', 'CategoryController', [
            'prefix' => 'admin.'
        ])->except(['index', 'show']);
    });
    Route::get('/articles/categorie/{category_id}', 'CategoryController@index')->name('category.index');
    Route::get('/admin/subcategory/{id}/edit', 'SubCategoryController@edit')->name('admin.subcategory.edit');

    // Recherche
    Route::get('/articles/search', 'SearchController@search')->name('search');

    // TODO: A supprimer
    Route::get('/threads', 'ArticleController@threads')->name('threads');
});

// Utilisateur
Route::namespace('Auth')->group(function() {

    // CRUD de la classe User
    Route::resource('user', 'UserController')->except(['index', 'show', 'create']);

    // Partie "Mon compte"
    Route::get('/deconnexion', 'LoginController@logout')->name('logout');
    Route::get('/mon-compte', 'UserController@edit')->name('edit');
    Route::get('/options', 'UserController@options')->name('options');
    Route::get('/avances', 'UserController@advanced')->name('advanced');

    // Connexion
    Route::get('/connexion', 'LoginController@showLoginForm')->name('login');
    Route::post('/connexion', 'LoginController@login');
    // Inscription
    Route::get('/inscription', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/inscription', 'RegisterController@register');

    // Mot de passe oublié
    Route::get('mot-de-passe/reinitialisation', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('mot-de-passe/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('mot-de-passe/reinitialisation/{token}', 'ResetPasswordController@showResetForm');
    Route::post('mot-de-passe/reinitialisation', 'ResetPasswordController@reset');
});

Route::namespace('Chat')->group(function() {
    // Messagerie privée
    Route::get('/chat', 'ChatController@index')->name('chat.index');
    Route::get('/chat/{id}', 'ChatController@chat')->name('chat.chat');

    // Ajax de la messagerie privée
    Route::group(['prefix'=>'ajax', 'as'=>'ajax::'], function() {
        Route::post('chat/send', 'ChatController@store')->name('chat.new');
        Route::delete('chat/delete/{id}', 'ChatController@delete')->name('chat.delete');
    });
});

Route::namespace('Formation')->group(function() {
    Route::get('/formation/creation', 'FormationController@create')->name('create.formation');
    Route::post('/formation/creation', 'FormationController@store')->name('store.formation');
    Route::get('/formation/list', 'FormationController@show')->name('show.formation');
});

Route::get('/question', function() {
    return view('question-answer');
})->name('question');

Route::get('/agents', function() {
    return view('listing-agents');
})->name('listing-agents');
