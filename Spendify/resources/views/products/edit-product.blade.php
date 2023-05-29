<x-app>
	<section class="container my-5">
		<div class="card">
			<div class="card-header">
				<h2>Product Edit</h2>
			</div>
			<div class="card-body">
				<form action="{{route('product.edit.put', ['product' => $product->id])}}" method="POST">
					@csrf
					@method('PUT')
					<x-product.form-product />
				</form>
			</div>
		</div>
	</section>
</x-app>
