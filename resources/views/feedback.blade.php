@extends('layouts.master')

@section('content')
<div class="row">
    <div style="padding: 10px;">
        <h3 style="margin: 0 20px;">
            Feedback
        </h3>

        <hr>

        <div style="margin: 0 20px; font-size:16px">
            <form class="form" style="min-width: 320px;" method="POST">
                <div class="form-group">
                    <label for="subjectField">Subject</label>
                    <input type="text" class="form-control" id="subjectField" placeholder="Enter subject">
                </div>
                <div class="form-group">
                    <label for="messageField">Message</label>
                    <textarea class="form-control" id="messageField" placeholder="Write a message" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Feedback</button>
            </form>
        </div>
    </div>
</div>
@endsection