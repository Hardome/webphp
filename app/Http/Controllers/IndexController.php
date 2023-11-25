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
        return view('add', [
            'rubrics' => Rubrics::all()
        ]);
    }

    public function rubric($id)
    {
        $rubric = Rubrics::findOrFail($id);

        return view('rubric', [
            'rubric' => $rubric,
            'news' => $rubric->news
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
        $request->validate([
            'title' => 'required|max:255',
            'lid' => 'required',
            'rubricsId' => 'required|numeric',
            'content' => 'required',
            'image' => 'required'
        ]);

        $data = $request->all();
        $statya = new News();
        $statya->fill($data);
        $statya->save();

        return redirect()->route('statya', ['id' => $statya->id]);
    }

    public function deleteNews($id)
    {
        $statya = News::findOrFail($id);

        $statya->delete();

        return redirect()->route('rubric', ['id' => $statya->rubricsId]);
    }
}
