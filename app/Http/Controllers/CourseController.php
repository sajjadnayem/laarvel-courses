<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses(Request $request)
    {
        $search = $request->search;
        $level = $request->level;
        $courses = Course::where(function ($query) use ($search) {
            if (!empty($search)){
                $query->where('name','like','%'.$search.'%');
            }
        })->paginate(12);

        $levels = Level::all();
        return view('course.courses', [
            'courses' => $courses,
            'levels'=> $levels,
        ]);
    }
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->with(['platform', 'topics', 'series', 'level', 'authors', 'reviews'])->first();
//        return response()->json($course);
        if (empty($course)) {
            abort(404);
        }
        return view('course.single', [
            'course' => $course,
        ]);
    }
}
