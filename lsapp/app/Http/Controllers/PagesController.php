<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //method
    public function index()
    {
        $title = 'Welcome to my Site, Albert !!!';
        /* return view('pages.index', compact('title')); */
        return view('pages.index')->with('title',$title);
    }

    public function about()
    {
        /* return view('pages.about'); */
        $title = 'Welcome to About page, Albert !!!';
        /* return view('pages.index', compact('title')); */
        return view('pages.about')->with('title',$title);
    }

    public function services()
    {
        //Assiative array
        $data = array('title'=>'Service Page, Albert',
                'services' => ['Web Design','Programming','DB Analyst','CEO']
        );
        return view('pages.services')->with($data);
    }
}
