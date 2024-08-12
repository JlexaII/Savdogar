@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Информация и фото (левая колонка) -->
            <div class="col-md-8">
                <h1>{{ $advertisement->title }}</h1>
                <div class="row">
                    @if ($advertisement->images)
                        @foreach (json_decode($advertisement->images) as $image)
                            <div class="col-md-6 mb-4">
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $advertisement->title }}"
                                    class="img-thumbnail" style="width: 100%; height: auto;">
                            </div>
                        @endforeach
                    @endif
                </div>
                <p class="card-text">{{ $advertisement->description }}</p>
                <p class="card-text"><strong>{{ __('messages.price') }}:</strong> {{ $advertisement->price }}</p>
                <p class="card-text"><strong>{{ __('messages.tel') }}:</strong> {{ $advertisement->phone }}</p>
                <p class="card-text mt-3 text-muted">
                    <strong>{{ __('messages.timepub') }}:</strong> {{ $advertisement->created_at->format('d.m.Y H:i') }}
                </p>
            </div>

            <!-- Карта и адрес (правая колонка) -->
            <div class="col-md-4">
                <!-- Карта -->
                <div id="map" style="height: 400px; width: 100%;"></div>
                <input type="hidden" id="latitude" value="{{ $advertisement->latitude }}">
                <input type="hidden" id="longitude" value="{{ $advertisement->longitude }}">

                <!-- Адрес -->
                <div class="mt-3">
                    <p class="card-text"><strong>{{ __('messages.address') }}:</strong> {{ $advertisement->address }}</p>
                    <input type="hidden" name="address" id="address" class="form-control"
                        value="{{ old('address', $advertisement->address) }}" readonly>
                    @error('address')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Другие объявления из этой категории (Карусель) -->
        <div class="mt-5">
            <h3>{{ __('messages.tpoh') }}</h3>
            <div id="similarAdsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($similarAds as $index => $similarAd)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($similarAd as $ad)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ asset('storage/' . json_decode($ad->images)[0]) }}"
                                                class="card-img-top" alt="{{ $ad->title }}" style="height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $ad->title }}</h5>
                                                <p class="card-text">{{ Str::limit($ad->description, 50) }}</p>
                                                <a href="{{ route('advertisements.show', $ad->id) }}"
                                                    class="btn btn-link">{{ __('messages.op') }}</a>
                                                <p class="card-text mt-2 text-muted">
                                                    {{ $ad->created_at->format('d.m.Y H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#similarAdsCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#similarAdsCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>
    </div>
@endsection
