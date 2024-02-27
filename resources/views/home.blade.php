@extends('layouts.app')

@section('title-block')
    Main page Axmedov's LTD.
@endsection

@section('content')  
    <p>Today we have several products and we offer to deliver equipment for your business on mutually beneficial terms. The
        equipment contains many years of work of engineers from equipment manufacturer plants such as Shandong JINLI CNC
        Machine Tool Co.,Ltd. Below we have provided our authorization letter and we are official representatives in
        Uzbekistan.</p>
        <img src="{{ asset('/image/autoriz.jpg')}}" width="70%">
@endsection

@section('aside')
    @parent
    <p>Text this is the main</p>
@endsection
