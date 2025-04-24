@extends('layouts.header')

@section('content')	
<div class="container">
	<div class="columns four admin-menu">
	@if( $access == 1 )
    	@include('layouts.sidemenu_admin')
	@else 
		@include('layouts.sidemenu_user')
	@endif
	</div>
	
	<div class="columns eight admin_dash admin-ticket-chart">	
		
		<div class="row" id="update">
			<div class="columns four">
				<a href="/manage_ticket">
					<div class="stat">
						<h3>{{ $active->count() }}</h3>
						<h5>Tickets</h5>
					</div>
				</a>
			</div>
			
			<div class="columns four">
				<a href="/user_management">
					<div class="stat">
						<h3>{{ $users->count() }}</h3>
						<h5>Users</h5>
					</div>
				</a>
			</div>
		
			<div class="columns four">
				<a href="/manage_site">
					<div class="stat">
						<h3>{{ $dept->count() }}</h3>
						<h5>Departments</h5>
					</div>
				</a>
			</div>
		</div>
				
		<hr>
		
		<table class="u-full-width" id="update1">
		  <thead>
		  <tbody>
		    <tr>
		      <td>Number of Administrators</td>
		      <td>{{ $isAdmin->count() }}</td>
		    </tr>
		    <tr>
		      <td>Number of Users</td>
		      <td>{{ $users->count() }}</td>
		    </tr>
		    <tr>
		      <td>Total Number of Tickets</td>
		      <td>{{ $active->count() }}</td>
		    </tr>
			<tr>
		      <td>Total Number of Unanswered Tickets</td>
		      <td>{{ $unanswer->count() }}</td>
		    </tr>
			<tr>
		      <td>Total Number of Open Tickets</td>
		      <td>{{ $open->count() }}</td>
		    </tr>
			<tr>
		      <td>Total Number of Resolved Tickets</td>
		      <td>{{ $resolved->count() }}</td>
		    </tr>
			<tr>
		      <td>Site Date</td>
			  <td>{{ $datetime->format('jS \of F Y'); }}</td>
		    </tr>
		    <tr>
		      <td>Site Time</td>
			  <td>{{ $datetime->toTimeString(); }}</td>
		    </tr>
		    <tr>
		      <td>Site Timezone</td>
			  <td>{{ $datetime }}</td>
		    </tr>
		  </tbody>
		</table>
		
	</div> 
</div>


<div style="margin-top:100px;display: block;"><!-- space acting footer --></div>

@endsection

@push('scripts')
       <script src="js/functions.js"></script>
@endpush
	
