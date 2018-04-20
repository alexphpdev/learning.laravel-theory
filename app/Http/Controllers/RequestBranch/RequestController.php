<?php

namespace App\Http\Controllers\RequestBranch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    /*protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }*/

    public function contact(Request $request, $id = null)
    {
//        print_r($request->all());
        echo "<h1 style='margin-top: 200px'>" . $id . "</h1>";
//        print_r($request->input('name'));
        /*if ($request->has('name')) {
            echo $request->input('name');
        }*/
//        print_r($request->only('name', 'site'));
//        print_r($request->except('name', 'site'));

//        echo $request->name;


//        echo $request->path();

//        if ($request->is('*/contact/*')) {
//            echo $request->path();
//        }

//        echo $request->url();
//        echo $request->fullUrl();

//        echo $request->method();
        /*if ($request->isMethod('GET')) {
            echo 'get';
        }*/

//        if ($request->isMethod('POST')) {
//            $request->flash();
//            $request->flashOnly('name');
//            $request->flashExcept('name');
            //return redirect()->route('contact')->withInput();
//            $request->flush();
//        }

//        echo $request->root();
//        print_r($request->query());

//        print_r($request->header());
//        print_r($request->server());
//        print_r($request->segments());



        return view('default.contact', ['title' => 'adsfjlsjdl, my title']);
    }

    public function validation(Request $request)
    {
        if ($request->isMethod('POST')) {
            $rules = [
                'name' => 'required|max:10',
                'email' => 'required|email'
            ];

            $request->validate($rules);
//            $this->validate($request, $rules);
            //dump($request->all());
        }

        return view('default.contact', ['title' => 'Contacts(Validate)']);
    }
}
