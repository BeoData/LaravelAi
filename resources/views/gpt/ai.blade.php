@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('sidebar')
            </div>
            <div class="col-md-6">
                
                <div class="card">
                    <div class="card-body">
                        <img src="https://images.squarespace-cdn.com/content/v1/5c803bcdca525b07e1afa896/c003ac73-a176-40e6-a942-7b77737a7ef5/Encounter+AI+LOGO-05-01.png?format=1500w" alt="Google Logo" class="mb-2" style="max-width: 150px">
                        <form method="GET" action="{{ route('gpt-ai') }}">
                     
                            @csrf <!-- Add this line to include CSRF protection -->

                            <div class="input-group mb-3">
                                <input id="textfield" type="text" class="form-control" name="textfield" placeholder="Search Google">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        @isset($answer)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Answer') }}</h5>
                                    <p class="card-text">{{ $answer }}</p>
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 