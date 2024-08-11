<footer class="bg-dark text-white py-2">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6 mb-2">
                <h5>{{ __('messages.company') }}</h5>
                <p>{{ __('messages.comp1') }}.</p>
            </div>            
        </div>
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">© 2024 AMS. {{ __('messages.right') }}.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="{{ route('privacy') }}" class="text-white me-3">{{ __('messages.privace') }}</a>
                <a href="{{ route('terms') }}" class="text-white">{{ __('messages.terms') }}</a>
            </div>
        </div>
    </div>
</footer>
