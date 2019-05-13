<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\User;
use Illuminate\Support\Facades\Mail;

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
        $message = $request->message;

        $user = User::find($user_id);
        $data = ['name' => $user['name'], 'body' => $message];

        Mail::send('emails.feedback', $data, function ($message) use ($user, $subject) {
            $message
                ->to(env('MAIL_USERNAME'), 'Admin')
                ->from($user->email, $user->name)
                ->subject($subject);
        });

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
