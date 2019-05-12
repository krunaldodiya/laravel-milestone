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
                    <input required minlength="5" type="text" class="form-control" id="subjectField"
                        placeholder="Enter subject">
                </div>

                <div class="form-group">
                    <label for="messageField">Message</label>
                    <textarea required minlength="10" class="form-control" id="messageField"
                        placeholder="Write a message" rows="5"></textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Send Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection