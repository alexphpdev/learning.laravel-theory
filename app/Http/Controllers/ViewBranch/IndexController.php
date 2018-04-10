<?php

namespace App\Http\Controllers\ViewBranch;

use Illuminate\Http\Request;
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
        return view()->file($path . '/default/template.php', ['title' => 'Turtles']);
        */



    }
}
