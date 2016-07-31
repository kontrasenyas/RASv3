@if(Session::has('success'))
	
		<script>
    			swal("Success!", "{{ Session::get('success') }}", "success")
		</script>
	
@endif

{{-- @if(count($errors) > 0)
	<div class="alert alert-success text-center" role="alert">
			<strong>Error:</strong> 
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
	</div>
@endif --}}


