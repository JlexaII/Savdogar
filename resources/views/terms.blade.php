<!-- resources/views/terms.blade.php -->
@extends('layouts.app')

@section('title-block', __('messages.terms'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('messages.terms') }}</h1>
    <p>{{ __('messages.terms1') }}.</p>
    
    <h2>{{ __('messages.terms2') }}</h2>
    <p>{{ __('messages.terms3') }}.</p>

    <h2>{{ __('messages.terms4') }}</h2>
    <p>{{ __('messages.terms5') }}.</p>

    <h2>{{ __('messages.terms6') }}</h2>
    <p>{{ __('messages.terms7') }}.</p>

    <h2>{{ __('messages.priv9') }}</h2>
    <p>{{ __('messages.terms8') }}</p>
</div>
@endsection
