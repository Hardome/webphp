<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Staff;

class IndexController extends Controller
{
  public function index()
  {
    return view('index', [
        'header' => 'Резюме и вакансии',
        'Persons'=> Person::paginate(10)
    ]);
  }

  public function showResume(Request $request)
  {
    return view('resume', [
        'User' => Person::findOrFail($request->id)
    ]);
  }

  public function addResume()
  {
    $staffs = Staff::all();

    return view('add-content', ['staffs'=> $staffs]);
  }

  public function storeResume(Request $request)
  {
    $request->validate([
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

    return redirect()->route('show', ['id' => $resume->id]);
  }

  public function deleteResume($id)
  {
    $person = Person::findOrFail($id);

    $person->delete();

    return redirect('/resume');
  }

  public function editResume($id)
  {
    $person = Person::findOrFail($id);
    $staffs = Staff::all();

    return view('editResume', [
        'staffs'=> $staffs,
        'person'=> $person
    ]);
  }

  public function updateResume(Request $request, $id)
  {
    $person = Person::findOrFail($id);

    $request->validate([
        'FIO' => 'required|max:255',
        'Phone' => 'required|numeric',
        'Stage' => 'required|numeric',
        'Staff' => 'required|numeric',
        'Image' => 'nullable|file|string'
    ]);

    if($request['Image'] === null) {
        unset($request['Image']);
    }

    $person->update($request->all());

    return redirect()->route('show', ['id' => $id]);
  }
}
