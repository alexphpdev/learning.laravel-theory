<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('myMiddleware');
    }

    public function getArticles()
    {
        return 'getArticles';
    }

    public function getArticle($id)
    {
        return 'getCertainArticle';
    }

    public function getPagesList($pages)
    {
        return 'Вы запросили ' . $pages;
    }


}

