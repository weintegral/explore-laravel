<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = "John Doe Blog";
        $data['description'] = "Welcome to my blog. I blog about programming and web development.";

        return view('home/index', $data);
    }
}
