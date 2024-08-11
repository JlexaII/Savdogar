<!-- resources/views/privacy.blade.php -->
@extends('layouts.app')

@section('title-block', __('messages.priv1'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('messages.priv1') }}</h1>
    <p>{{ __('messages.priv2') }}.</p>
    
    <h2>{{ __('messages.priv3') }}</h2>
    <p>{{ __('messages.priv4') }}.</p>

    <h2>{{ __('messages.priv5') }}</h2>
    <p>{{ __('messages.priv6') }}.</p>

    <h2>{{ __('messages.priv7') }}</h2>
    <p>{{ __('messages.priv8') }}.</p>

    <h2>{{ __('messages.priv9') }}</h2>
    <p>{{ __('messages.priv10') }}</p>
</div>
@endsection
