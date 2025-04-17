@extends('layouts.header')

@section('content')		

<div class="container">
	<div class="row">
		<div class="four columns admin-menu">
		@include('layouts.sidemenu_admin')
		</div>
		
		<div class="eight columns settings-forms">		
			<div class="columns eight">
	            <h4>Edit department</h4>
	            <span id="dptERR"></span>
	            <form id="dptform" method="POST" action="/update_dept/{{ $t_dept->id }}">
				@csrf
		            <input type="text" placeholder="Department Name" name="update_dept" id="dept_new" value="{{ $t_dept->name }} " class="u-full-width">
		            <button type="submit" name="update">Update Department</button>
		            <button id="delete_dpt" class="button button-blank" name="delete">Delete</button>
		        </form>
		        <div class="alert"><b>Please note:</b> Deleting a department will delete all tickets associated with it.</div>
			</div>
		</div>

	</div>
</div>

<div style="margin-top:100px;display: block;"><!-- space acting footer --></div>
@endsection

@push('scripts')
       <script src="../js/functions.js"></script>
@endpush