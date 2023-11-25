<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Rubrics;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'news' => News::orderBy('created_at', 'desc')->paginate(5),
            'role' => Auth::user()->role ?? 0
        ]);
    }

    public function add()
    {
        return view('add', [
            'rubrics' => Rubrics::all()
        ]);
    }

    public function rubric($id)
    {
        $rubric = Rubrics::findOrFail($id);

        return view('rubric', [
            'rubric' => $rubric,
            'news' => $rubric->news,
            'role' => Auth::user()->role ?? 0
        ]);
    }

    public function statya($id)
    {
        return view('statya', [
            'statya' => News::findOrFail($id)
        ]);
    }

    public function storeNews(Request $request)
    {
        if (Auth::user()->role === 0) {
            redirect()->route('index');
        }

        $request->validate([
            'title' => 'required|max:255',
            'lid' => 'required',
            'rubricsId' => 'required|numeric',
            'content' => 'required',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $path = $photo->store('photos', 'public');
        }

        $data = $request->all();
        $data['image'] = $path;
        $statya = new News();
        $statya->fill($data);
        $statya->save();

        return redirect()->route('statya', ['id' => $statya->id]);
    }

    public function deleteNews($id)
    {
        $statya = News::findOrFail($id);

        if (Auth::user()->role === 0) {
            return redirect()->route('rubric', ['id' => $statya->rubricsId]);
        }

        $statya->delete();

        return redirect()->route('rubric', ['id' => $statya->rubricsId]);
    }
}
