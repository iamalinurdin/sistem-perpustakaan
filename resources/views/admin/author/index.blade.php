@extends('admin.templates.default')

@section('content')
	<h1>Penulis</h1>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Author</h3>
			<a href="{{ route('admin.author.create') }}" class="btn btn-primary">Tambah Author</a>
		</div>
		<div class="box-body">
			<table id="dataTable" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

<form action="" method="post" id="deleteForm">
	@csrf
	@method('DELETE')
	<button class="btn btn-danger" style="display: none;">Hapus</button>
</form>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/dist/js/bootstrap-notify.min.js') }}"></script>
@include('admin.templates.partials.alert')
<script>
	$(function () {
		$('#dataTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{ route('admin.author.data') }}',
			columns: [
				{data: 'DT_RowIndex', orderable: false, searchable: false},
				{data: 'name'},
				{data: 'action'}
			]
		})
	})
</script>
@endpush