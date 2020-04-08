@if(session('toast'))
<script type="text/javascript">
	M.toast({html: '{{ session('toast') }}'})
</script>
@endif
