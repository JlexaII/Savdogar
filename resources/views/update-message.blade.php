@extends('layouts.app')

@section('title-block')
    Update record
@endsection

@section('content')
    <h1>Update record</h1>

    <form action="{{ route('contact-update-submit', $data->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Enter name</label>
            <input type="text" class="form-control" value="{{ $data->name }}" name="name" placeholder="Enter name" id="name">
        </div>
        <div class="form-group">
            <label for="email">Enter email</label>
            <input type="text" class="form-control" value="{{ $data->email }}" name="email" placeholder="Enter email" id="email">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" value="{{ $data->subject }}" name="subject" placeholder="topic text" id="subject">
        </div>
        <div class="form-group">
            <label for="message">Text message</label>
            <textarea name="message" id="message" class="form-control" placeholder="Enter message">{{ $data->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update message</button>
    </form>
@endsection
