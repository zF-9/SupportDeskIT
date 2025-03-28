@extends('layouts.header')

@section('content')	
    <!-- -->


	
<div class="container">
	<div class="row">
		<div class="four columns admin-menu">
		@include('layouts.admin_sidemenu')
		</div>
		
		<div class="eight columns settings-forms">		
			<!-- Here lies scripts -->
			<div class="accordionButton">Departments</div>
			<div class="accordionContent">
				<table class="u-full-width departments-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Edit</th>
    					</tr>
  					</thead>
					@foreach($department as $key => $dept)
  					<tbody id="all_departments">
					  <tr>
						<td>{{ $dept->id }}</td>
						<td>{{ $dept->name }}</td>
						<td><a href="/manage_dept/{{$dept->id}}"><span class="entypo-cog"></span></a></td>
					  </tr>
  					</tbody>
					@endforeach
				</table>
			<form method="POST" id="add_department" action="{{ route('addSection') }}">
				@csrf
				<div class="row">
					<div class="columns ten">
						<input class="u-full-width" type="text" placeholder="New Department Name" id="dpt" name="department">
					</div>
					
					<div class="columns two">
						<button class="button u-full-width" type="submit" name="add_department">Add</button>
					</div>
				</div>	
			</form>	

			</div>

			<div class="accordionButton">Accessibility</div>
			<div class="accordionContent admin-accessibility">
				<div class="row">
					<div class="columns eight">Allow users to self delete account</div>
					
					<div class="columns four">
						<input type="checkbox" name="allow_self_delete" id="allow_self_delete" class="toggler">
						<label for="allow_self_delete"></label>
					</div>
				</div>
				
				<div class="row">
					<div class="columns eight">Allow users to sign in</div>
					
					<div class="columns four">
						<input type="checkbox" name="allow_signin" id="allow_signin" class="toggler">
						<label for="allow_signin"></label>
					</div>
				</div>
				
				<div class="row">
					<div class="columns eight">Allow new users to register</div>
					
					<div class="columns four">
						<input type="checkbox" name="allow_register" id="allow_register" class="toggler">
						<label for="allow_register"></label>
					</div>
				</div>
				
				<div class="row">
					<div class="columns eight">Enable spam accounts protection</div>
					
					<div class="columns four">
						<input type="checkbox" name="enable_protection" id="enable_protection" class="toggler">
						<label for="enable_protection"></label>
					</div>
				</div>
			</div>
			
			<div class="accordionButton">About</div>
			<div class="accordionContent">
					<ul>
						<li>Version 1.0</li>
					</ul>

					
			</div>
		</div>
	</div>
</div>

<div style="margin-top:100px;display: block;"><!-- space acting footer --></div>

@endsection

@push('scripts')
       <script src="js/functions.js"></script>
@endpush
	