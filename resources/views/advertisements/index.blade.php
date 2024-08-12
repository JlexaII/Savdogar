@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ __('index.text') }}</h1>

        <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">{{ __('index.text2') }}</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ __('index.text3') }}</th>
                        <th>{{ __('messages.opis') }}</th>
                        <th>{{ __('index.text4') }}</th>
                        <th>{{ __('index.text5') }}</th>
                        <th>{{ __('index.text6') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($advertisements as $advertisement)
                        <tr>
                            <td>{{ $advertisement->title }}</td>
                            <td>{{ Str::limit($advertisement->description, 50) }}</td>
                            <td>
                                @if ($advertisement->images)
                                    @foreach (json_decode($advertisement->images) as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail"
                                            style="max-height: 50px; max-width: 50px;">
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if ($advertisement->is_active == 0)
                                    <span class="badge bg-warning">{{ __('index.text7') }}</span>
                                @elseif ($advertisement->is_active == 1)
                                    <span class="badge bg-success">{{ __('index.text8') }}</span>
                                @elseif ($advertisement->is_active == 2)
                                    <span class="badge bg-secondary">{{ __('index.text9') }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> <!-- Редактировать -->
                                </a>
                                <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> <!-- Удалить -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{ __('index.text10') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
