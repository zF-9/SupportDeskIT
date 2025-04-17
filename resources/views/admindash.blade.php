@extends('layouts.header')

@section('content')
<div class="container">
<div class="row home-hero">
    <div class="six offset-by-three columns">

	    <h4>Welcome, 
            <!-- php echo $users->getuserinfo('nick_name'); -->
			{{ Auth::user()->name }} 
			@if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </h4>
		<ul><div id="log">
			<li>Last login 
            <!-- php echo $time->ago($users->getuserinfo('last_login')); -->
			{{ session('status') }}
            </li>
    </div>
		</ul>
	    <a href="/{{ Auth::user()->id }}/edit_user" class="button">Edit Account</a>
        <!-- php if($users->getuserinfo('user_group') == 1){ echo '<a href="./admin" class="button button-primary">Admin Panel</a>'; }; -->
		@if($access == true)
			<!--<p>yooooooooooo soldja boi</p>-->
			<a href="/overview" class="button button-primary">Admin Panel</a>
		@endif
	    <a href="{{ route('logout') }}" class="button button-blank">
			<span class="entypo-logout">
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
				</form>
			</span>
		</a>

	</div>
</div>

<br><br>

<div class="row home-sections">
    <div class="six columns">
		<div class="section" id="new">
		    <div class="entypo-list-add"></div>
		    <b>Open New Ticket</b>
		    <p>Create or view support tickets to receive responses from our team.</p>
	    </div>
	</div>



    <div class="six columns">
		<div class="section" id="current">
			<div class="entypo-list"></div>
			@if($access == true)
		    	<b>Current Tickets</b>
			@Else 
				<b>Tickets</b>
			@endif
		    <p>View and manage any tickets that may have responses from our team.</p>
	    </div>
	</div>
</div>
 
 
<div style="display:none" class="section_view_new">
  		<span id="create_ticket_error"></span>
		<form method="POST" id="create_ticket" action="{{ route('OpenTicket') }}">
		@csrf
		<div class="row">
			<div class="columns six">
				<label for="subject">Subject</label>
				<input type="text" placeholder="Subject" class="u-full-width" id="subject" name="subject">
			</div>
			
			<div class="columns six">
				<label for="department">Department</label>
				<select id="department" class="u-full-width" name="department">
					<option disabled="disabled">Please select department</option>
					@foreach($departments as $key => $dept)
						<option value="{{ $dept->id }}">{{ $dept->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<label for="subject">Message</label>
		<textarea placeholder="Message" id="message" name="message" style="min-height:300px;" class="u-full-width"></textarea>
		
		<button type="submit" name="submit">Post Ticket</button>
		</form>
</div>	

<div style="display: none" class="section_view_current">
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
	@if( $access == 1 )
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
	</tbody>
	</table>
</div>

</div>

<div style="margin-top:100px;display: block;"><!-- space acting footer --></div>

@endsection

@push('scripts')
       <script src="js/functions.js"></script>
@endpush


