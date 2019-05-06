<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function feedback()
    {
        return view('feedback');
    }

    public function getSchools(Request $request)
    {
        $schools = School::get();

        return ['schools' => $schools];
    }

    public function resetDevice(Request $request)
    {
        User::where('id', $request->id)->update(['uid' => null, 'account_status' => 'Pending']);

        return redirect()->back();
    }
}
