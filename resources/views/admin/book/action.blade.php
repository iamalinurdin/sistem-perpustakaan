<a href="{{ route('admin.book.edit', $model) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('admin.book.destroy', $model) }}" class="btn btn-danger" id="delete">Hapus</a>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
	$('a#delete').on('click', function (e){
		e.preventDefault();
		var href = $(this).attr('href')

		Swal.fire({
		  title: 'Anda yakin?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		  	document.getElementById('deleteForm').action = href
				document.getElementById('deleteForm').submit()
		    Swal.fire(
		      'Terhapus!',
		      'Your file has been deleted.',
		      'success'
		    )
		  }
		})

		

	})
</script>