<?php

namespace App\Http\Controllers;

use App\Models\Creativity;
use App\Models\MasterClass;
use App\Models\MasterClassRegistration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', []);
    }

    public function creativity(Request $request)
    {
        if (isset($request->id)) {
            $creativity = Creativity::findOrFail($request->id);
        } else {
            $creativity = Creativity::where('name', $request->name)->first();
        }

        return view('creativity', [
            'creativity' => $creativity
        ]);
    }

    public function profile(Request $request)
    {
        return view('profile', [
            'user' => Auth::user(),
            'master_classes' => Auth::user()->master_classes
        ]);
    }
}
