<?php

namespace App\Http\Controllers\RequestBranch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Http\Requests\ContactRequest;

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
//        echo "<h1 style='margin-top: 200px'>" . $id . "</h1>";
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



//        $ses = $request->session()->get('key', 'lbkajfdklfdsf');
        session()->put('key', 'myKey');
        $ses = session()->all();

        if (session()->has('key')) {
            echo session()->get('key') . '<br>';
            session()->put(['key.second' => 'myKey2']);
            session()->push('key.third', 'second_3');
//            session()->forget('key');
//            session()->flush();
//            print_r(session()->pull('key'));
            session()->flash('temp_message', 'for one request');
//            session()->reflash();
        }

        dd(session()->all());



        return view('default.contact', ['title' => 'adsfjlsjdl, my title']);
    }

    public function validation(ContactRequest /*Request*/ $request)
    {
        /*if ($request->isMethod('POST')) {
            $rules = [
                'name' => 'required|max:10',
                'email' => 'required|email'
            ];

            $request->validate($rules);
//            $this->validate($request, $rules);
            //dump($request->all());
        }

        return view('default.contact', ['title' => 'Contacts(Validate)']);*/


        if ($request->isMethod('POST')) {
            /*$rules = [
                'name' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('validation')->withErrors($validator)->withInput();
            }*/
        }

        return view('default.contact', ['title' => 'Contacts(Validate)']);
    }

    public function show()
    {
        return view('default.contact', ['title' => 'Contacts(Validate)']);
    }
}
