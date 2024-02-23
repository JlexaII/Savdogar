@extends('layouts.app')

@section('title-block')
    Contact
@endsection

@section('content')
    <h1>Contact numbers</h1>

    <form action="{{ route('contact-form') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Enter name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" id="name">
        </div>
        <div class="form-group">
            <label for="email">Enter email</label>
            <input type="text" class="form-control" name="email" placeholder="Enter email" id="email">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" placeholder="topic text" id="subject">
        </div>
        <div class="form-group">
            <label for="message">Text message</label>
            <textarea name="message" id="message" class="form-control" placeholder="Enter message"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Send message</button>
    </form>
@endsection
