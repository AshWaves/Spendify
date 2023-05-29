<x-app>
	<table></table>
	<section class="container">
		<div class="card my-5">

			<div class="card-header d-flex justify-content-between">
				<h2>Users</h2>
				<a href="/"  class="btn btn-success me-2">Back</a>
				<a href="{{route('user.create')}}" class="btn btn-primary">User Create</a>
			</div>

			<div class="card-body">
				<table class="table">
					<thead>
					  <tr>
						<th scope="col">Document</th>
						<th scope="col">Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col">Acciones</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<th>{{$user->document_id}}</th>
								<td>{{$user->name}}</td>
								<td>{{$user->last_name}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->addres}}</td>
								<td class="d-flex">
									<a href="{{route('user.edit', ['user' => $user->id])}}" class="btn btn-warning btn-sm me-1">Editar</a>
									<form action="{{route('user.delete', ['user' => $user->id])}}" method="post">
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
