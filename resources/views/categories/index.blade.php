<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ __('increate.text') }}</h1>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="{{ route('advertisements.create', $category->id) }}" class="d-block text-center mb-4 category-link">
                        <div class="icon-container">
                            <img src="{{ asset('images/icons/' . $category->icon) }}" alt="{{ __('categories.' . $category->name) }}" class="img-fluid">
                            <p>{{ __('categories.' . $category->name) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<style>
.icon-container {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background-color: #f9f9f9;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.icon-container img {
    width: 100px;
    height: 100px;
}
.icon-container p {
    margin-top: 10px;
    text-decoration: none;
    color: #333;
}
.category-link {
    text-decoration: none;
}
.category-link:hover .icon-container {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
