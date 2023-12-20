<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CoursesMembers;
use App\Models\LanguageGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $courses = Courses::orderBy('created_at', 'desc')->get();

        $courses = $courses->map(
            function ($course) {
                $course['hasRecord'] = $course->members->contains('userId', Auth::user()->id);

                return $course;
            },
            $courses
        );

        return view('index', [
            'courses' => $courses,
            'role' => Auth::user()->isAdmin
        ]);
    }

    public function course($id)
    {
        return view('course', [
            'course' => Courses::findOrFail($id)
        ]);
    }

    public function courseAdd()
    {
        if(Auth::user()->isAdmin === 0) {
            return redirect()->route('index');
        }

        return view('addCourse', [
            'groups' => LanguageGroup::all()
        ]);
    }

    public function storeCourse(Request $request)
    {
        if(Auth::user()->isAdmin === 0) {
            return redirect()->route('index');
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'startAt' => 'required',
            'image' => 'required',
            'limit' => 'required|numeric',
            'languageGroupId' => 'required|numeric|exists:language_groups,id'
        ]);

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $path = $photo->store('photos', 'public');
        }

        $data = $request->all();
        $data['image'] = $path;
        $course = new Courses();
        $course->fill($data);
        $course->save();

        return redirect()->route('course', ['id' => $course->id]);
    }

    public function deleteCourse($id)
    {
        $course = Courses::findOrFail($id);

        if(Auth::user()->isAdmin === 0) {
            return redirect()->route('index');
        }

        $course->delete();

        return redirect()->route('index');
    }

    public function courseRegister($id)
    {
        $hasRecord = CoursesMembers::where('courseId', $id)->where('userId', Auth::user()->id)->count();

        if ($hasRecord > 0) {
            return redirect('index');
        }

        $registration = new CoursesMembers([
            'courseId' => $id,
            'userId' => Auth::user()->id
        ]);

        $registration->save();

        return redirect()->route('index');
    }

    public function profile()
    {
        return view('profile', [
            'user' => Auth::user(),
            'records' => CoursesMembers::where('userId',  Auth::user()->id)->get()
        ]);
    }

    public function deleteRecord($id)
    {
        $record = CoursesMembers::findOrFail($id);

        $record->delete();

        return redirect()->route('profile');
    }

    public function admin()
    {
        if(Auth::user()->isAdmin === 0) {
            return redirect()->route('index');
        }

        return view('admin', [
            'user' => Auth::user(),
            'courses' => Courses::all(),
            'records' => CoursesMembers::all()
        ]);
    }

    public function courseRecords(Request $request)
    {
        $records = CoursesMembers::where('courseId',  $request->courseId)->get();

        return view('members', [
            'records' => $records
        ])->render();
    }

    public function deleteRecordInAdminPage($id)
    {
        if(Auth::user()->isAdmin === 0) {
            return redirect()->route('index');
        }

        $record = CoursesMembers::findOrFail($id);

        $record->delete();

        return redirect()->route('admin');
    }

    public function language($id)
    {
        $group = LanguageGroup::findOrFail($id);

        $courses = $group->courses;

        $courses = $courses->map(
            function ($course) {
                $course['hasRecord'] = $course->members->contains('userId', Auth::user()->id);

                return $course;
            },
            $courses
        );

        return view('language', [
            'group' => $group,
            'courses' => $courses,
            'role' => Auth::user()->isAdmin
        ]);
    }

    public function list(Request $request)
    {
        $courses = Courses::orderBy('created_at', 'desc');

        if ($request->active === 'true') {
            $courses->where('startAt', '>',  now());
        }

        if ($request->full === 'true') {
            $courses->whereRaw('`limit` = (select count(*) from courses_members where courses.id = courses_members.courseId)');
        }

        if ($request->ended === 'true') {
            $courses->where('startAt', '<',  now());
        }


        $courses = $courses->get();

        $courses = $courses->map(
            function ($course) {
                $course['hasRecord'] = $course->members->contains('userId', Auth::user()->id);

                return $course;
            },
            $courses
        );

        return view('list', [
            'courses' => $courses,
            'role' => Auth::user()->isAdmin
        ]);
    }
}
