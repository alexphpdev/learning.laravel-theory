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

Route::get('/', ['as' => 'home', function () {
     return view('welcome');
}]);

Route::get('/page', function () {
    return view('page');
});

Route::get('/env', function () {
    echo '<pre>';
    print_r($_ENV);
    echo config('app.locale') . "<br>";
    Config::set('app.locale', 'ru');
    echo Config::get('app.locale') . "<br>";
    echo env('APP_ENV');
    echo '</pre>';
});

Route::get('/form', function () {
    return view('form');
});

/*Route::post('/comments', function () {
    print_r($_POST);
});*/

/*Route::match(['get', 'post'], '/comments', function () {
    print_r($_POST);
});*/

Route::any('/comments', function () {
    print_r($_POST);
});


//Route::get('/page/{id}/{cat?}', function ($idd, $catt=null) {
//    print_r($idd);
//    if(isset($catt)) {
//        print_r($catt);
//    }
//
//});

Route::get('/page/{id}', function ($id) {
   print_r($id);
})->where('id', '[0-9]+');

Route::get('/page/{id}/{cat}', function ($id, $cat) {
   print_r($id);
   echo "<br>";
   print_r($cat);
})/*->where([
    'id'=> '[0-9]+',
    'cat' => '[a-zA-Z]+',
])*/;

Route::get('/article/{id}', ['as' => 'article', function ($id) { echo "/article/$id";}]);


Route::group(['prefix' => 'admin/{id}'], function () {

    Route::get('/page/create', function () { echo '/page/create';});

    Route::get('/page/edit', function () { echo '/page/edit';});

    Route::get('/page/links', function () {
        echo "<a href='".route('home')."'>";
        echo 'Go home';
        echo '</a>';

        echo '<br>';

        echo "<a href='".route('article', ['id' => 10])."'>";
        echo 'Go to article with ID = 10';
        echo '</a>';
    });

    Route::get('/page/getParametersFromObject/{bla}', function () {
        $route = Route::current();
        echo $route->getName();
        echo '<br>';
        print_r($route->parameters());
    })->name('route object');



    Route::get('/page/redirectToHome', function () {
        return redirect()->route('home');
    });


});


Route::get('/about', 'FirstController@show');
Route::get('/dir/about', 'Dir\FirstController@show');
Route::get('/about/{id}', 'FirstController@getId');


Route::get('/articles', ['uses'=>'Admin\CoreController@getArticles', 'as' => 'articles']);
Route::get('/article/{id}', 'Admin\CoreController@getArticle')->name('article');

Route::get('/quiz/info', 'Admin\CoreResource@info');
Route::resource('/quiz', 'Admin\CoreResource', ['only' => ['index', 'show']]);














