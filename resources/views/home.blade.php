@extends('frontend.templates.default')

@section('content')
<div class="row">
  <h3>Buku yg sedang dipinjam</h3>
  @foreach($books as $book)
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
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
