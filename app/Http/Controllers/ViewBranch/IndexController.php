<?php

namespace App\Http\Controllers\ViewBranch;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

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
}
