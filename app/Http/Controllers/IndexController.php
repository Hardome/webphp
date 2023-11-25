<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Rubrics;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'news' => News::paginate(5)
        ]);
    }

    public function add()
    {
        return view('add');
    }
}
