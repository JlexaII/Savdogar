@extends('layouts.app')

@section('title-block')
    Axmedov's LTD.
@endsection

@section('content')  
<p align="justify">Сегодня у нас есть несколько продуктов и мы предлагаем поставить оборудование для вашего бизнеса на взаимовыгодных условиях.
        оборудование содержит многолетний труд инженеров заводов-производителей оборудования, таких как Shandong JINLI CNC
        Машиностроительная Компания. Ниже мы предоставили наше авторизационное письмо и являемся официальными представителями в
        Узбекистане и России.</p>
        <img src="{{ asset('/image/CNC1.gif') }}" width="80%">
        <img src="{{ asset('/image/CNC2.gif') }}" width="80%">        
@endsection

@section('aside')
    @parent
    <p>На главной странице появляються новости</p>
@endsection
