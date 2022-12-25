<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index($slug)
    {
        $topic = Topic::where('slug', $slug)->first();
        $courses = $topic->courses()->paginate(12);
        return view('topic.single', [
            'archive' => $topic,
            'courses' => $courses,
        ]);

//        $courses = $archive->courses()->paginate(12);

    }

}
