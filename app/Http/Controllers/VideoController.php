<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function getVideos(Request $request)
    {
        $videos = Video::where('topic_id', $request->topic_id)->get();

        return compact('videos');
    }
}
