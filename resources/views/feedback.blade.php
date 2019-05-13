@extends('layouts.master')

@section('content')
<div class="row">
    <div style="padding: 10px;">
        <div style="margin: 0 20px; font-size:16px">
            <form class="form" style="min-width: 320px;" method="POST">
                @csrf

                <input hidden name="user_id" value="{{$user->id}}" />

                <div class="form-group">
                    <label for="subjectField">Subject</label>
                    <input type="text" required minlength="5" name="subject" class="form-control" id="subjectField"
                        placeholder="Enter subject">
                </div>

                <div class="form-group">
                    <label for="messageField">Message</label>
                    <textarea required minlength="10" name="message" class="form-control" id="messageField"
                        placeholder="Write a message" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send Feedback</button>
                </div>

                @if(session('message'))
                <div style="color: green;">{{session('message')}}</div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection