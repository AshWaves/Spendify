{{-- number id --}}
<div class="mb-3">
	<label for="name" class="form-label">Document</label>
	<input type="number" name="document_id" class="form-control @error('document_id') is-invalid @enderror"
	value="{{old('document_id')? old('document_id'): (isset($user)? $user->document_id: '')}}">

	@error('document_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- role --}}
<div class="mb-3">
	<label for="role" class="form-label">Role</label>
	<select name="role" id="role" class="form-control">
		@foreach ($roles as $role )
			<option value="{{$role}}">{{$role}}</option>
		@endforeach

	</select>
	@error('role')
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

{{-- last name --}}
<div class="mb-3">
	<label for="name" class="form-label">Last Name</label>
	<input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
	value="{{old('last_name')? old('last_name'): (isset($user)? $user->last_name: '')}}">

	@error('last_name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>




{{-- email --}}
<div class="mb-3">
	<label for="name" class="form-label">Email</label>
	<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
	value="{{old('email')? old('email'): (isset($user)? $user->email: '')}}">

	@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- password --}}
<div class="mb-3">
	<label for="name" class="form-label">Password</label>
	<input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

	@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- password --}}
<div class="mb-3">
	<label for="name" class="form-label">Confirm Password</label>
	<input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">

	@error('password_confirmation')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
{{-- Addres --}}
<div class="mb-3">
	<label for="name" class="form-label">Address</label>
	<input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
	value="{{old('address')? old('address'): (isset($user)? $user->address: '')}}">

	@error('address')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>


{{-- buttons --}}
<button type="submit" class="btn btn-primary">Send</button>
<a href="/Users"  class="btn btn-warning me-2">Cancel</a>

