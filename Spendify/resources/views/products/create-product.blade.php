<x-app>
	<section class="container my-5">
		<div class="card">
			<div class="card-header">
				<h2>Product Create</h2>
			</div>
			<div class="card-body">
				<form action="{{route('product.create.post')}}" method="POST">
					@csrf
					<x-product.form-product/>
				</form>
			</div>
		</div>
	</section>
</x-app>
