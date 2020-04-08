<button href="{{ route('admin.borrow.return', $model) }}" class="btn btn-info" id="delete">Pengembalian</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
	$('button#delete').on('click', function (e){
		e.preventDefault();
		var href = $(this).attr('href')

		Swal.fire({
		  title: 'Anda yakin?',
		  text: "Buku sudah dikembalikan?!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		  	document.getElementById('returnForm').action = href
			document.getElementById('returnForm').submit()
		    Swal.fire(
		      'Terhapus!',
		      'Your file has been deleted.',
		      'success'
		    )
		  }
		})
	})
</script>