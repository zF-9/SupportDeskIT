@extends('layouts.header')

@section('content')	
<div class="container">
	<div class="row">
		<a href="/overview" class="go-back"><span class="entypo-left-open"></span>Dashboard</a>
		<br><br>
		
		<div class="ticket-insert">
			<div class="columns three">
				<div class="profile">				
					<ul>
						<li><b>{{ $ticketlog->name }}</b></li>
                        
                        @if($ticketlog->user_group == 1)
                            <li>Administrator</li>
                        @else
                            <li> General User</li>
                        @endif
						<li><a href="#">Edit Account</a></li>
					</ul>
				</div>
			</div>
		
			<div class="columns nine">
				<h4>{{$ticketlog->title}}</h4>
				<hr>
				{{$ticketlog->init_msg}} 
				<ul>
					<li>Posted {{$ticketlog->created_at}}</li>
                    @if( $ticketlog->resolved  == 0)
                        <li><a id="no_longer_help" href="#"><span class="entypo-check"></span>I no longer need help</a></li>
                    @elseif( $ticketlog->user_id  ==  Auth::user()->id )
                        <li>This ticket has been marked resolved.</li>
                    @elseif( $ticketlog->user_group == 1 && $ticketlog->resolved == 1 )
                        <li>Ticket Closed</li>
                    @endif
				</ul>
			</div>
		</div>
	</div>
	<!-- ticket post end -->	
	
	<hr>
	<div id="update">
	<!-- reply start -->
	<span id="replies"></span>
	<!-- reply end -->
	</div>
	<div class="row">
		<div class="ticket-insert">
			<div class="columns three">
				<div class="profile">				
					<ul>
						<li><b>{{Auth::user()->name}}</li>
                        @if( $ticketlog->user_group == 1)
                            <li>Administrator</li>
                        @else
                            <li>General User</li>
                        @endif
						<li><a href="#">Edit Account</a></li>
					</ul>
				</div>
			</div>
            @if($ticketlog->resolved == 0)
            <div class="columns nine">
                <form id="reply">
                    <textarea id="rtext" class="u-full-width" placeholder="Enter your reply..."></textarea>
                    <button type="submit">Add Reply</button>
                </form>
            </div>

            @else
            <div class="columns nine">
                @if($ticketlog->user_group == 0)
                    <div class="alert warning">This ticket has been closed, please open another support ticket for further support.</div>
                @else
                    <div class="alert warning">This ticket has been closed.</div>
                @endif
                <form>
                    <textarea id="rtext" class="u-full-width" disabled placeholder="Enter your reply..."></textarea>
                    <button disabled>Add Reply</button>
                </form>
            </div>

            </div>
            @endif
        </div>
	
</div>
</div>
<div style="margin-top:100px;display: block;"><!-- space acting footer --></div>

@endsection

@push('scripts')
       <script src="js/functions.js"></script>
@endpush
	

