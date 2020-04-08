@extends('admin.templates.default')

@section('content')
	<h1>Data Peminjaman</h1>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Peminjaman</h3>
		</div>
		<div class="box-body">
			<table id="dataTable" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>Judul</th>
						<th>Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

<form method="post" id="returnForm">
	@csrf
	@method('PUT')
	<input class="btn btn-danger" style="display: none;" type="submit" value="return">
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
			ajax: '{{ route('admin.borrow.data') }}',
			columns: [
				{data: 'DT_RowIndex', orderable: false, searchable: false},
				{data: 'user_name'},
				{data: 'book_title'},
				{data: 'action'}
			]
		})
	})
</script>
@endpush