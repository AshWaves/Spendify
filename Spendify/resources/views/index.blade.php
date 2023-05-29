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
	<h3 class="d-flex justify-content-center">Welcom to Spendify</h3>
	<section class="d-flex justify-content-center flex-wrap">

		@foreach ($categories as $category )
			<div class="card mx-3 my-3" style="width: 18rem;">
				{{-- <h5>Category</h5> --}}
				@if ($category->image)
					<img src="/storage/images/categories/{{$category->image}}" class="card-img-top" alt="Category">
				@else
					<img src="http://localhost/Spendify-app/Spendify/resources/views/yzto5jns.bmp" class="card-img-top" >
				@endif

				<div class="card-body">
					<h5 class="card-title">{{$category->name}}</h5>
					<a href="#" class="btn btn-primary">View</a>
				</div>
			</div>
		@endforeach
	</section>
</x-app>
