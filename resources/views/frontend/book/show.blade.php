@extends('frontend.templates.default')

@section('content')
<h4>Detail Buku</h4>
<div class="col s12 m6">
	<div class="card horizontal hoverable">
    <div class="card-image">
      <img src="{{ $book->getCover() }}">
    </div>
    <div class="card-stacked">
      <div class="card-content">
    		<h4>{{ $book->title }}</h4>
    		<hr>
        <blockquote>{{ $book->short_description }}</blockquote>
        <p>
        	<i class="material-icons">person</i><small>author</small> : {{ $book->author->name }}
        </p>
        <p>
        	<i class="material-icons">book</i><small>qty</small> : {{ $book->quantity }}
        </p>
      </div>
      <div class="card-action">
        <form action="{{ route('book.borrow', $book) }}" method="post">
		    	@csrf
		    	<button class="btn red accent-1 waves-effect waves-light right">Pinjam Buku</button>
		    </form>
      </div>
    </div>
  </div>
</div>

<h5>Buku lainnya dari {{ $book->author->name }}...</h5>
<div class="row">
	@foreach($book->author->books->shuffle()->take(4) as $book)
		@include('frontend.templates.components.card', ['book' => $book])
	@endforeach
</div>
@endsection