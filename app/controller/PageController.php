<?php

namespace App\Controller;

class PageController
{
    public function home()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
}