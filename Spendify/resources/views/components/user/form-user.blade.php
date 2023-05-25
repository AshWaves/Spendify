<div class="card">
	<div class="card-header">
		<h2>{{ $type }} User</h2>
	</div>
	<div class="card-body">
		<form>
			{{-- DOCUMENT --}}
			<div class="mb-3">
				<label for="Document" class="form-label">Document</label>
				<input type="number" name="document_id "class="form-control @error('document_id') is-invalid @enderror">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			{{-- NAME --}}
			<div class="mb-3">
				<label for="name" class="form-label">First Name</label>
				<input type="text" name="name "class="form-control @error('name') is-invalid @enderror">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			{{-- LAST NAME --}}
			<div class="mb-3">
				<label for="last_name" class="form-label">Last Name</label>
				<input type="text" name="last_name "class="form-control @error('last_name') is-invalid @enderror">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			{{-- EMAIL --}}
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" name="email"class="form-control @error('email') is-invalid @enderror">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			{{-- PASSWORDD --}}
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" name="passwword "class="form-control @error('password') is-invalid @enderror">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			{{-- CONFIRM PASSWORD --}}
			<div class="mb-3">
				<label for="password" class="form-label">Confirm Password</label>
				<input type="password" name="password_confirmation"class="form-control @error('password_confirmation') is-invalid @enderror">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			{{-- ADDRESS --}}
			<div class="mb-3">
				<label for="address" class="form-label">Address</label>
				<input type="text" name="address "class="form-control @error('address') is-invalid @enderror">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<button type="submit" class="btn btn-primary">Send</button>
			<a href="/Users" class="btn btn-warning">Cancel</a>
		</form>
	</div>


</div>
