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

  public function addPerson(Request $request)
  {
    $this->validate($request, [
    'fullName'=>'required|max:255',
    'phoneNumber' => 'required',
    'stage' => 'required',
    'staff' => 'required',
    ]);

    $data = $request->all();
    $person = new Person();
    $person->fill($data);
    $person->save();


    var_dump($person);

    return redirect()->route('show', ['id' => $person->id]);
  }
}
