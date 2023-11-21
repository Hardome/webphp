<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Staff;

class lab4Controller extends Controller
{
  public function staffList()
  {
    return view('liststaff', Staff::paginate(5));
  }


  public function firstQuery()
  {
    return view('lab4.first', [
        'Persons' => Person::whereBetween('Stage', [5, 15])->get()
    ]);
  }
}
