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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('accueil');
});

/*
Route avec un paramètre borné
*/

Route::get('{n}', function($n) {
    return 'Je suis la page ' . $n . ' !';
})->where('n','[1-3]');

/*
Route nommée permet de géner l'url http://ecommerce.dv/contact avec l'helper route('home')
*/
Route::get('contact', function() {
    return "Ceci est la page contact";
})->name('contact');

/*
Route avec paramètre et transmission à la vue
*/

Route::get('article/{n}', function($n) {
    return view('article')->withNumero($n);
})->where('n', '[0-9]+');

Route::get('facture/{n}', function($n) {
    return view('facture')->withNumero($n);
})->where('n', '[0-9]+');


/*
Route qui fait appel à un controleur
*/

Route::get('/', 'WelcomeController@index')->name('home');

/*
Route qui fait appel à un controleur avec des paramètres
*/

Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');

/*
Route pour le formulaire
*/

Route::get('users', 'UsersController@create');
Route::post('users', 'UsersController@store');

/*
Route pour le formulaire avec verification champs
*/

Route::get('contact', 'ContactController@create');
Route::post('contact', 'ContactController@store');

/*
Route test emails*/

Route::get('/test-contact', function () {
    return new App\Mail\Contact([
      'nom' => 'Durand',
      'email' => 'durand@chezlui.com',
      'message' => 'Je voulais vous dire que votre site est magnifique !'
      ]);
});

/*
Validation formulaire upload image
*/

Route::get('photo', 'PhotoController@create');
Route::post('photo', 'PhotoController@store');
