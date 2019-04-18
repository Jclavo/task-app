@if (!Auth::check())
	<script>window.location.href = "{{ url('/') }}"</script>
@endif