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

  public function secondQuery()
  {
    return view('lab4.second', [
        'Persons' => Person::join('Staff', 'person.Staff', '=', 'staff.id')
        ->where('Staff.staff', 'Программист')
        ->get()
    ]);

    // return view('lab4.second', [
    //     'Persons' => Person::where('Staff', 1)
    //     ->get()
    // ]);
  }

  public function thirdQuery()
  {
    return view('lab4.third', [
        'count' => Person::all()->count()
    ]);
  }
}
