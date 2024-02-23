@extends('layouts.app')

@section('title-block')
    Home page
@endsection

@section('content')
    Main page
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem maiores laboriosam natus molestiae aliquid
        neque, minus totam! Dicta fugiat laudantium enim? Numquam placeat quisquam assumenda necessitatibus voluptate sint
        quibusdam. Debitis.</p>
@endsection

@section('aside')
    @parent
    <p>Text this is the main</p>
@endsection
