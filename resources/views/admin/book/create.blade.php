@extends('admin.templates.default')

@push('styles')
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
	<div class="box">
		<div class="box-header">
			<h3>Tambah Data Buku</h3>
		</div>

		<div class="box-body">
			<form method="post" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
				@csrf

				<div class="form-group @error('title') has-error @enderror">
					<label>Judul</label>
					<input type="text" name="title" placeholder="masukan judul buku" class="form-control" value="{{ old('title') }}">
					@error('title')
						<span class="help-block">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group @error('short_description') has-error @enderror">
					<label>Deskripsi</label>
					<textarea class="form-control" rows="3" name="short_description" placeholder="tuliskan deskripsi">{{ old('short_description') }}</textarea>
					@error('short_description')
						<span class="help-block">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group @error('author_id') has-error @enderror">
					<label>Penulis</label>
					<select class="form-control select2" name="author_id">
						@foreach($authors as $author)
						<option value="{{ $author->id }}">{{ $author->name }}</option>
						@endforeach
					</select>
					@error('author_id')
						<span class="help-block">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group @error('cover') has-error @enderror">
					<label>Cover</label>
					<input type="file" name="cover" class="form-control">
					@error('cover')
						<span class="help-block">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group @error('quantity') has-error @enderror">
					<label>Jumlah</label>
					<input type="text" name="quantity" placeholder="masukan judul buku" class="form-control" value="{{ old('quantity') }}">
					@error('quantity')
						<span class="help-block">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Masukan</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
	$('.select2').select2()
</script>
@endpush