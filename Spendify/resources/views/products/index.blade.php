<x-app>
	<section class="container">
		<div class="card my-5">

			<div class="card-header d-flex justify-content-between">
				<h2>Products</h2>
				<a href="/Users"  class="btn btn-success me-2">back</a>

				<a href="{{route('product.create')}}" class="btn btn-primary">Product Create</a>
			</div>

			<div class="card-body">
				<table class="table">
					<thead>
					  <tr>
						<th scope="col">Category</th>
						<th scope="col">seller</th>
						<th scope="col">name</th>
						<th scope="col">price</th>
						<th scope="col">stock</th>
						<th scope="col">status</th>
						<th scope="col">description</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
							<tr>
								<th>{{$product->category_id}}</th>
								<td>{{$product->seller_id}}</td>
								<td>{{$product->name}}</td>
								<td>{{$product->price}}</td>
								<td>{{$product->stock}}</td>
								<td>{{$product->status}}</td>
								<td>{{$product->description}}</td>
								<td class="d-flex">
									<a href="{{route('product.edit', ['product' => $product->id])}}" class="btn btn-warning btn-sm me-1">Editar</a>
									<form action="{{route('product.delete', ['product' => $product->id])}}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger btn-sm">Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
</x-app>
