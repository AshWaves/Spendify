{{-- @extends('layouts.app')

@section('content')
<div class="container">
	<example-component :categories="{{$categories}}"/>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<x-app title="Spendify">
    <section class="d-flex justify-content-center flex-wrap">
        @foreach ($categories as $category)
            <div class="card my-3 mx-4" style="width: 18rem;">
                <img src="https://api.api-ninjas.com/v1/randomimage?category='city'" class="card-img-top"
                    alt="Category-img">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </section>
</x-app>
