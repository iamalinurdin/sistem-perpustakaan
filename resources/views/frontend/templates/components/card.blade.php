<div class="col s12 m6">
	<div class="card horizontal hoverable">
    <div class="card-image">
      <img src="{{ $book->getCover() }}">
    </div>
    <div class="card-stacked">
      <div class="card-content">
      	<a href="{{ route('book.show', $book->id) }}">
      		<h5>{{ Str::limit($book->title, 25) }}</h5>
      	</a>
        <p>{{ Str::limit($book->short_description, 50) }}</p>
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