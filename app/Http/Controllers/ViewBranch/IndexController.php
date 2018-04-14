<?php

namespace App\Http\Controllers\ViewBranch;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use DB;
use App\Article;

class IndexController extends Controller
{
    public function show()
    {
//        $title = '$title';
//        return view('default.template', compact('title'));


        /*return view('default.template')
            ->with('title', 'title1')
            ->with('title2', 'title2')
            ->with('title3', 'title3')
        ;*/

        /*if (view()->exists('default.template')) {
            $title = 'wild animals';
            return view('default.template')->with('title', $title);
        }*/

        $isViewExist = view()->exists('default.template');
        abort_unless($isViewExist, 404);

        $title = 'wild animals';
        /*return view('default.template')->with('title', $title);*/

        /*
        $view = view('default.template', ['title' => $title])->render();
        echo '<pre>';
        echo htmlspecialchars($view);
        echo '</pre>';
        exit;
        */

        /*
        $path = config('view.paths')[0];
        return view()->file($path . '/default/layout.blade.php', ['title' => 'Turtles']);
        */
    }


    public function showBlade()
    {
        $array = array(

            'title'=>'Laravel Project',
            'data' =>[
                'one' => 'List 1',
                'two' => 'List 2',
                'three' => 'List 3',
                'four' => 'List 4',
                'five' => 'List 5'
            ],
            'dataI' =>['List 1','List 2','List 3','List 4','List 5'],

            'bvar' => true,
            'script' =>"<script>alert('hello')</script>"

        );

        return view('default.index', $array);
    }

    public function about()
    {
//        abort_unless(view()->exists('default.about'), 404);
//
//        return view('default.about')->with('title', 'wild animals');
        $view = view('default.about')->with('title', 'wild animals');
//        return (new Response($view, 200, ['  ']));

//        return (new Response($view))->header('Content-Type', 'myType');

//        return response($view)->header('Content-Type', 'myType');

//        return response()->json(['name' => 'ajdklsf', 'nextParam' => 'secondValue']);

        /*return response()
            ->view('default.about', ['title' => 'titleValue'])
            ->header('Content-Type', 'myType');*/

//        return response()->download('robots.txt', 'myText.txt');

//        return redirect('http://google.com');

//        return new RedirectResponse('http://google.com');

//        return RedirectResponse::create('http://google.com');

//        return redirect('http://google.com')->withInput();

//        return redirect()->route('home');

//        return redirect()->action('ViewBranch\IndexController@show', ['id' => 134]);

//        return redirect('/articles')->with('param1', 'value1');

        return response()->myRes('sfsfsf');

    }


    public function sqlQueries()
    {
//        DB::insert("INSERT INTO articles (name, text) VALUES (?, ?)", ['test 1', 'text']);

//        DB::update("UPDATE articles SET name = ? WHERE id = ?", ['new name', 6]);

//        DB::delete("DELETE FROM articles WHERE id = ?", [6]);

        /*DB::insert("INSERT INTO articles (name, text) VALUES (?, ?)", ['test 1', 'text']);

        $lastInsertId = DB::connection()->getPdo()->lastInsertId();

        echo $lastInsertId . '<br><br>';*/

//        DB::statement('DROP table articles');



        $result = DB::select("SELECT * FROM articles");
        dd($result);
    }

    protected static $articles = [];

    protected static function addArticles($article)
    {
        self::$articles[] = $article;
    }

    public function queryBuilder()
    {
//        $articles = DB::table('articles')->get();
//        $articles = DB::table('articles')->first();
//        $articles = DB::table('articles')->value('name');
//        dd($articles);
/*
        DB::table('articles')->orderBy('id')->chunk(2, function ($processedData) {
            foreach ($processedData as $el) {
                self::addArticles($el);
            }
        });

        dd(self::$articles);
 */

//        $result = DB::table('articles')->pluck('name');
//        $result = DB::table('articles')->count();
//        $result = DB::table('articles')->max('id');
//        $result = DB::table('articles')->min('id');
//        $result = DB::table('articles')->avg('id');
//        $result = DB::table('articles')->select('name', 'img')->get();
//        $result = DB::table('articles')->distinct()->select('name', 'img')->get();
        /*$query = DB::table('articles')->select('name');
        if (3 == 1+2) {
            $query->addSelect('img as картинка');
        }
        $result = $query->get();*/

//        $result = DB::table('articles')->select('name', 'img')->where('id', 3)->first();

        /*$result = DB::table('articles')
            ->select('text as fulltext')
            ->where('id', '<', '999')
//            ->where('name', 'like', 'test%', 'or')
            ->OrWhere('name', 'like', 'test%')
            ->get()
        ;*/

        /*$result = DB::table('articles')
            ->select('text as fulltext')
            ->where([
                ['id', '<', '999'],
                ['name', 'like', 'test%', 'or']
            ])
            ->get()
        ;*/

//        $result = DB::table('articles')->whereBetween('id', [1,3])->get();
//        $result = DB::table('articles')->whereNotBetween('id', [1,3])->get();

//        $result = DB::table('articles')->whereIn('id', [1,2,3])->get();

//        $result = DB::table('articles')->groupBy('name')->get();

//        $result = DB::table('articles')->take(2)->get();
//        $result = DB::table('articles')->take(2)->skip('3')->get();

        /*DB::table('articles')->insert([
            [
                'name' => 'nnnname1',
                'img' => 'pathtoimg1',
                'text' => 'new text 1',
            ],
            [
                'name' => 'nnnname2',
                'img' => 'pathtoimg2',
                'text' => 'new text 2',
            ]
        ]);*/

        /*$lastId = DB::table('articles')->insertGetId([
            'name' => 'nnnname1',
            'img' => 'pathtoimg1',
            'text' => 'new text 1',
        ]);*/

        /*DB::table('articles')
            ->where('id', 11)
            ->update([
                'name' => 'updated name'
            ])
        ;*/

//        DB::table('articles')->where('id', 11)->delete();

//        $result = DB::table('articles')->whereNull('img')->get();
//        $result = DB::table('articles')->whereNotNull('img')->get();

//        DB::table('articles')->increment('numColumn', 5);
//        DB::table('articles')->decrement('numColumn', 5);

        $result = DB::table('articles')->get();

        dd($result);
    }

    public function models()
    {
        /*$res = Article::all();

        $r = [];
        foreach ($res as $el) {
            $r[] = $el->text;
        }*/

//        $res = Article::where('id', '>', 3)->get();
//        $res = Article::where('id', '>', 3)->orderBy('name')->take(2)->get();
//        $res = Article::chunk(2, function($articles) {})
//        $res = Article::find(2); // search by id
//        $res = Article::find([2,3,4,5]); // search by id
//        $res = Article::findOrFail(123);
//        $res = Article::where('id', 123)->firstOrFail();


        /*$article = new Article;
        $article->text = 'text from model';
        $article->img = 'img from model';
        $article->name = 'name from model';
        $article->save();*/

        /*Article::create([
            'name' => 'new name from model',
            'text' => 'new text from model'
        ]);*/

        /*$article = Article::find(12);
        $article->name = 'updated name';
        $article->save();*/

//        Article::find(12)->update(['name' => 'updated two times']);

        // найдёт и вернёт или создаст
        /*$findedArticle = Article::firstOrCreate([
            'name' => 'first or create name',
            'text' => 'first or create text',
        ]);*/

//        найдёт и вернёт или создаст объект но не вставит в БД
        /*$articleWithoutInsert = Article::firstOrNew([
            'name' => 'first or new name',
            'text' => 'first or new text',
        ]);

        $articleWithoutInsert->save();*/


//        Article::find(8)->delete();
//        Article::destroy(9);
//        Article::destroy([1,2,3,4]);
//        Article::where('id', '>', '100')->delete();

//        soft delete
        /*$article = Article::find(13);
        $article->delete();*/

        /*$res = Article::withTrashed()->get();
        foreach ($res as $article) {
            if ($article->trashed()) {
                echo $article->id . ' Удалена<br>';
                $article->restore();
                echo $article->id . ' Восстановлена<br>';
            }
        }*/

//        Article::onlyTrashed()->restore();

        /*$article = Article::where('id', 13)->first();
        $article->forceDelete();*/




        $res = Article::all();

        dd($res);
    }
}
