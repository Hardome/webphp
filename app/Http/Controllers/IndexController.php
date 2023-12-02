<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'news' => Courses::orderBy('created_at', 'desc')->paginate(5),
            'role' => Auth::user()->role ?? 0
        ]);
    }

    public function course($id)
    {
        return view('course', [
            'course' => Courses::findOrFail($id)
        ]);
    }
}
