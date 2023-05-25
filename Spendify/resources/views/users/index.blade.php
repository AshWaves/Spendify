<x-app>
    <div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<H3>Users</H3>
			<a href="{{ route('user.create') }}" class="btn btn-primary">User Create</a>
		</div>
		<div class="card-body">
			<table class="table mx-4 mx-3">
				<thead>
					<tr>
						<th scope="col">C.C</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col">Address</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $users)
						<tr>
							<th>{{ $users->document_id }}</th>
							<td>{{ $users->name }}</td>
							<td>{{ $users->last_name }}</td>
							<td>{{ $users->email }}</td>
							<td>{{ $users->address }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>

		</div>
    </div>
</x-app>
