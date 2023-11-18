<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class IndexController extends Controller
{
  public function index()
  {
    $header = 'Резюме и вакансии';

    return view('page', ['header' => $header]);
  }

  public function show()
  {
    return view('resume', ['data' => [
      'lastName' => 'Иванов',
      'position' => 'Программист',
      'phoneNumber' => '55-55-55',
      'experience' => '4 года',
      'avatar' => 'ava1.jpg'
    ]]);
  }

  public function add()
  {
    return view('add-content');
  }

  public function resumeStore(Request $request)
  {
    $this->validate($request, [
      'FIO' => 'required|max:255',
      'Phone' => 'required|numeric',
      'Stage' => 'required|numeric',
      'Staff' => 'required|numeric',
      'Image' => 'required'
    ]);

    $data = $request->all();
    $resume = new Person();
    $resume->fill($data);
    $resume->save();

    // dd($resume);

    // return redirect()->route('show', ['id' => $resume->id]);
  }
}
