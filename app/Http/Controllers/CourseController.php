<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses()
    {
        return view('course.courses', [
            'courses' => Course::all()
        ]);
    }
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->with(['platform', 'topics', 'series', 'authors', 'reviews'])->first();
//        return response()->json($course);
        if (empty($course)) {
            abort(404);
        }
        return view('course.single', [
            'course' => $course,
        ]);
    }
}
