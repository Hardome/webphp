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
        if (Auth::user()->isMaster === 0) {
            return redirect()->route('index');
        }

        return view('profile', [
            'user' => Auth::user(),
            'master_classes' => Auth::user()->master_classes
        ]);
    }

    public function addMasterClass()
    {
        if (Auth::user()->isMaster === 0) {
            return redirect()->route('index');
        }

        return view('addMasterClass', [
            'creativity' => Creativity::all()
        ]);
    }
    public function storeMasterClass(Request $request)
    {
        if (Auth::user()->isMaster === 0) {
            return redirect()->route('index');
        }

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'date' => 'required|date|after_or_equal:now',
            'time' => 'required|date_format:H:i',
            'cost' => 'required|numeric',
            'limit' => 'required|numeric',
            'creativityId' => 'required|numeric|exists:creativity,id'
        ]);

        $data = $request->all();
        $data['startAt'] = Carbon::createFromFormat('Y-m-d H:i', $data['date'] . ' ' . $data['time'])->format('Y-m-d H:i:s');

        unset($data['date']);
        unset($data['time']);

        $data['creatorId'] = Auth::user()->id;
        $masterClass = new MasterClass($data);
        $masterClass->save();

        return redirect()->route('profile');
    }
}
