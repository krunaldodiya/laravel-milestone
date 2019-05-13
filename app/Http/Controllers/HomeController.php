<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

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

    public function feedbackForm(Request $request)
    {
        $user = User::find($request->userId);

        return view('feedback', ['user' => $user]);
    }

    public function sendFeedback(Request $request)
    {
        $user_id = $request->user_id;
        $subject = $request->subject;
        $body = $request->body;

        $user = User::find($user_id);

        Mail::to(env('MAIL_USERNAME'))->send(new FeedbackMail($user, $subject, $body));

        return redirect()->back()->with(['message' => 'Feedback sent successfully.']);
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
