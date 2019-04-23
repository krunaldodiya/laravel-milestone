<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class HomeController extends Controller
{
    public function getSchools(Request $request)
    {
        $schools = School::get();
        
        return ['schools' => $schools];
    }
}
