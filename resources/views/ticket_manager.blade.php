@extends('layouts.header')

@section('content')		

<div class="container">
	<div class="row">
		<div class="four columns admin-menu">
		@if( $access == true )
			@include('layouts.sidemenu_admin')
		@else 
			@include('layouts.sidemenu_user')
		@endif
		</div>


		<div class="eight columns settings-forms">		
		<!-- Here lies scripts -->		
		<div style=" " class="section_view_current">
			<table class="u-full-width">
			<thead>
				<tr>
				<th>Subject</th>
				<th>Status</th>
				<th>Last Reply</th>
				<th>Recent</th>
				</tr>
			</thead>
			<tbody>
			@if( $access == true )
				@foreach($ticket as $key => $ticks)
					<tr>
						<td><a href="/{{ $ticks->uniqid }}/view_ticket">{{$ticks->title}}</a></td>
						<td>
							<span class="entypo-comment"></span>
						</td>
						<td>{{$ticks->name}}</td>
						<td>{{$ticks->created_at}}</td>
					</tr>
				@endforeach
			@else 
				@foreach($own_ticket as $key => $ticks)
					<tr>
						<td><a href="/{{ $ticks->uniqid }}/view_ticket">{{$ticks->title}}</a></td>
						<td>
							<span class="entypo-comment"></span>
						</td>
						<td>{{$ticks->name}}</td>
						<td>{{$ticks->created_at}}</td>
					</tr>
				@endforeach	
			@endif			
				<!--<tr><td><a href="ticket/?id=67d100b4bc6f7">take a look at this bug!</a></td><td><span class="entypo-comment"></span></td><td>Me</td><td>2 weeks ago</td></tr>--> 
			</tbody>
			</table>
		</div>
</div>
</div>


<div style="margin-top:100px;display: block;"><!-- space acting footer --></div>
@endsection

@push('scripts')
       <script src="../js/functions.js"></script>
@endpush