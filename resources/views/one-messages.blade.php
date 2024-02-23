@extends('layouts.app')

@section('title-block')
    {{ $data->subject }}
@endsection

@section('content')
    <h1>{{ $data->subject }}</h1>
    
        <div class="alert alert-info">  
            <p>{{ $data->message }}</p>      
            <p>{{ $data->email }}</p>
            <p><small>{{ $data->created_at }}</small></p>
            <a href="{{ route('contact-data-one', $data->id) }}"><button class="btn btn-warning">Details</button></a>
        </div>
    
@endsection
