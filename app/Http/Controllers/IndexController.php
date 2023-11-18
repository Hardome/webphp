<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Staff;

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
      'FIO' => 'Иванов',
      'Staff' => 'Программист',
      'Phone' => '55-55-55',
      'Stage' => '4',
      'Image' => 'ava1.jpg'
    ]]);
  }

  public function add()
  {
    $staffs = Staff::all();

    return view('add-content', ['staffs'=> $staffs]);
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
