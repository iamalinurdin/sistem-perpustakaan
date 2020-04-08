@extends('admin.templates.default')

@section('content')
	<div class="box">
		<div class="box-header">
			<h3>Tambah Data Author</h3>
		</div>

		<div class="box-body">
			<form method="post" action="{{ route('admin.author.update', $author) }}">
				@csrf
				@method('PUT')

				<div class="form-group @error('name') has-error @enderror">
					<label>Nama</label>
					<input type="text" name="name" placeholder="masukan nama penulis" class="form-control" value="{{ old('name') ?? $author->name }}">
					@error('name')
						<span class="help-block">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Ubah</button>
				</div>
			</form>
		</div>
	</div>
@endsection