@extends('admin.templates.default')

@section('content')
	<h1>Buku</h1>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Laporan Buku Terlaris</h3>
		</div>
		<div class="box-body">
			<table id="dataTable" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Dekripsi</th>
						<th>Penulis</th>
						<th>Total Dipinjam</th>
						<th>Cover</th>
						<th>Aksi</th>
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
					@foreach($books as $book)
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $book->title }}</td>
						<td>{{ $book->short_description }}</td>
						<td>{{ $book->author->name }}</td>
						<td>{{ $book->borrowed_count }}</td>
						<td><img src="{{ $book->cover }}"></td>
					</tr>
					@php $no++ @endphp
					@endforeach
				</tbody>
			</table>

			{{ $books->links() }}
		</div>
	</div>



<form action="" method="post" id="deleteForm">
	@csrf
	@method('DELETE')
	<button class="btn btn-danger" style="display: none;">Hapus</button>
</form>
@endsection