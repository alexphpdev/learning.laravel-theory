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

/*Route::get('/', ['as' => 'home', function () {
     return view('welcome');
}]);*/

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


Route::group(['prefix' => 'admin/'], function () {

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

//Route::get('/posts/{pages}',
//    [
//        'middleware' => ['myMiddlewareGroup'],
//        'uses' => 'Admin\CoreController@getPagesList',
//        'as' => 'pagesList'
//    ]
//);

//Route::get('/posts/{pages}',
//    [
//        'uses' => 'Admin\CoreController@getPagesList',
//        'as' => 'pagesList'
//    ]
//)->middleware('myMiddleware');

//Route::get('/posts/{pages}',
//    [
//        'uses' => 'Admin\CoreController@getPagesList',
//        'as' => 'pagesList',
//    ]
//);

Route::get('/posts/{pages}',
    [
        'middleware' => 'myMiddleware:someStaticArgument',
        'uses' => 'Admin\CoreController@getPagesList',
        'as' => 'pagesList',
    ]
);

Route::get('/showMessage/{msg}', 'MessageController@getMessage')->name('showMessage');

Route::group(['middleware' => ['auth', 'myMiddleware', 'moreThan50']], function (){
//
//
//
});

Route::group(['prefix' => 'views'], function () {

    Route::get('/', 'ViewBranch\IndexController@show');

    Route::get('/about', 'ViewBranch\IndexController@about')->name('about');

    Route::get('/articles', 'ViewBranch\IndexController@show')->name('articles');

    Route::get('/article/{id}', 'ViewBranch\IndexController@show')->name('article');

});

Route::group(['prefix' => 'blade'], function () {

    Route::get('/', 'ViewBranch\IndexController@showBlade');

});

Route::group(['prefix' => 'request'], function () {
   Route::match(
       [
           'get',
           'post'
       ],
       '/contact/{name?}',
       [
           'uses' => 'RequestBranch\RequestController@contact',
           'as' => 'contact'
       ]
   );
});

Route::group(['prefix' => 'validation', 'middleware' => 'auth'], function () {
    Route::get(
        '/',
        [
            'uses' => 'RequestBranch\RequestController@show',
            'as' => 'showValidation'
        ]
    );
    Route::post(
        '/',
        [
            'uses' => 'RequestBranch\RequestController@validation',
            'as' => 'validation'
        ]
    );
});


Route::group(['prefix' => 'sql_queries'], function () {
    Route::get('/', 'ViewBranch\IndexController@sqlQueries');
});

Route::group(['prefix' => 'queryBuilder'], function () {
    Route::get('/', 'ViewBranch\IndexController@queryBuilder');
});

Route::group(['prefix' => 'models'], function () {
    Route::get('/', 'ViewBranch\IndexController@models');
});

Route::group(['prefix' => 'relationships'], function () {
    Route::get('/', 'ViewBranch\IndexController@relationships');
});

Route::group(['prefix' => 'work_with_related_records'], function () {
    Route::get('/', 'ViewBranch\IndexController@work_with_related_records');
});

Route::group(['prefix' => 'other_methods_for_related_tables'], function () {
    Route::get('/', 'ViewBranch\IndexController@other_methods_for_related_tables');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');


Route::group(
    [
        'prefix' => 'админ+панель',
        'middleware'=>
            [
                'web',
//                'auth'
            ],
    ],
    function() {

    Route::get('/',
        [
            'uses' => 'Admin\AdminController@show',
            'as' => 'admin_index',
        ]
    );

    Route::get('/add/post',
        [
            'uses' => 'Admin\AdminController@create',
            'as' => 'admin_add_post',
        ]
    );

});


Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'auth'], function() {

    Route::get('/login', 'Auth\MyAuthController@showLogin');
    Route::post('/login', 'Auth\MyAuthController@authenticate');






});








