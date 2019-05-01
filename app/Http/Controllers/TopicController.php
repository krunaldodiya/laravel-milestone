<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicController extends Controller
{
    public function getTopics(Request $request)
    {
        $categories = Topic::with('topics.videos')->where('topic_id', $request->topic_id)->get();

        return compact('categories');
    }
}
