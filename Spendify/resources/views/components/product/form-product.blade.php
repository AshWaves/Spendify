{{-- CATEGORY --}}
<div class="mb-3">
	<label for="name" class="form-label">Category</label>
	<input type="number" name="category_id" class="form-control @error('category_id') is-invalid @enderror"
	value="{{old('category_id')? old('category_id'): (isset($product)? $product->category_id: '')}}">

	@error('category_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
{{-- SELLER --}}
<div class="mb-3">
	<label for="name" class="form-label">Seller</label>
	<input type="number" name="seller_id" class="form-control @error('seller_id') is-invalid @enderror"
	value="{{old('seller_id')? old('seller_id'): (isset($product)? $product->seller_id: '')}}">

	@error('seller_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>


{{-- name --}}
<div class="mb-3">
	<label for="name" class="form-label">Name</label>
	<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
	value="{{old('name')? old('name'): (isset($user)? $user->name: '')}}"	>

	@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
<div class="mb-3">
	<label for="name" class="form-label">Price</label>
	<input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
	value="{{old('price')? old('price'): (isset($product)? $product->price: '')}}">

	@error('price')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<div class="mb-3">
	<label for="name" class="form-label">Stock</label>
	<input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
	value="{{old('stock')? old('stock'): (isset($product)? $product->stock: '')}}">

	@error('stock')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- Description --}}
<div class="mb-3">
	<label for="name" class="form-label">Description</label>
	<input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
	value="{{old('description')? old('description'): (isset($product)? $product->description: '')}}">

	@error('description')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- buttons --}}
<button type="submit" class="btn btn-primary">Send</button>
<a href="/Products"  class="btn btn-warning me-2">Cancel</a>

