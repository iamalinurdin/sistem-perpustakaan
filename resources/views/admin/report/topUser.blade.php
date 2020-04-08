@extends('admin.templates.default')

@section('content')
	<h1>Buku</h1>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Laporan User</h3>
		</div>
		<div class="box-body">
			<table id="dataTable" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Tanggal Bergabung</th>
						<th>Jumlah Peminjaman</th>
					</tr>
				</thead>
				<tbody>
					@php
						$page = 1;

						if (request()->has('page')) {
							$page = request('page');
						}

						$no = (env('PAGINATION_ADMIN') * $page) - (env('PAGINATION_ADMIN') - 1);
					@endphp
					@foreach($users as $user)
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at }}</td>
						<td>{{ $user->borrow_count }}</td>
					</tr>
					@php $no++ @endphp
					@endforeach
				</tbody>
			</table>

			{{ $users->links() }}
		</div>
	</div>



<form action="" method="post" id="deleteForm">
	@csrf
	@method('DELETE')
	<button class="btn btn-danger" style="display: none;">Hapus</button>
</form>
@endsection