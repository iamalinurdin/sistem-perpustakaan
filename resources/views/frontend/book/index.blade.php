@extends('frontend.templates.default')

@section('content')
<h2>Koleksi Buku</h2>
<blockquote>
	<p class="flow-text">Buku yang bisa kamu pinjam!</p>		
</blockquote>
<div class="row">
	@foreach($books as $book)
		@include('frontend.templates.components.card', ['book' => $book])
	@endforeach
</div>

<!-- Pagination -->
{{ $books->links('vendor.pagination.materialize') }}

@endsection