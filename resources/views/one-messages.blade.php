@extends('layouts.app')

@section('title-block')
    {{ $data->subject }}
@endsection

@section('content')
    <h1>{{ $data->subject }}</h1>
    
        <div class="alert alert-info">  
            <p>{{ $data->message }}</p>      
            <p>{{ $data->email }} - {{ $data->name }}</p>
            <p><small>{{ $data->created_at }}</small></p>
            <a href="{{ route('contact-update', $data->id) }}"><button class="btn btn-info">Update</button></a>
        </div>
    
@endsection
