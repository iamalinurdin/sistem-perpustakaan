@extends('admin.templates.default')

@section('content')
	<h1>Buku</h1>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Buku</h3>
			<a href="{{ route('admin.book.create') }}" class="btn btn-primary">Tambah Buku</a>
		</div>
		<div class="box-body">
			<table id="dataTable" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Dekripsi</th>
						<th>Penulis</th>
						<th>Jumlah</th>
						<th>Cover</th>
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
			ajax: '{{ route('admin.book.data') }}',
			columns: [
				{data: 'DT_RowIndex', orderable: false, searchable: false},
				{data: 'title', width: '13%'},
				{data: 'short_description', width: '15%'},
				{data: 'author'},
				{data: 'quantity'},
				{data: 'cover'},
				{data: 'action'},
			]
		})
	})
</script>
@endpush