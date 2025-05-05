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
						<!--<li><a href="#">Edit Account</a></li>-->
					</ul>
				</div>
			</div>
		
			<div class="columns nine">
				<h4>{{$ticketlog->title}}</h4>
				<hr>
				{{$ticketlog->init_msg}} 
				<ul>
				<li>Posted {{$ticketlog->updated_at}}</li>
				@if($ticketlog->resolved == 1)
				<li>
					<button id="no_lon" class="btn-danger" type="">
					<span class="entypo-eye"> </span>
						Ticket is closed
					</button>
				</li>
				@else
					@if( $ticketlog->user_id  ==  Auth::user()->id || Auth::user()->user_group == 1)
					<!-- add statement to check when the ticket is close or nah; (1): check if it's admin/OP; (2):check if it's closed -->
                    <li>
						<form action="/ticket_resolve/{{ $ticket_id }}" method="POST">
						{!! csrf_field() !!}
						<button id="no_longer_helpzzx" class="button" type="submit">
						<span class="entypo-check"></span>
							Mark as resolved
						</button>
						</form>
					</li>
					@else
					<li>you can not close this ticket</li>
					@endif
				@endif
				</ul>
			</div>
		</div>
	</div>
	<!-- ticket post end -->	
	<hr>

    @foreach($respond as $key => $reply)
	<div class="row">
		<div class="ticket-insert">
			<div class="columns three">
				<div class="profile">				
					<ul>
						<li><b>{{ $reply->name }}</b></li> 
                        @if($reply->user_group == 1)
                            <li>Administrator</li>
                        @else
                            <li> General User</li>
                        @endif
					</ul>
				</div>
			</div>
		
			<div class="columns nine">
				{{$reply->text}} 
				<ul>
					<li>Posted {{$reply->created_at}}</li>
				</ul>
			</div>
		</div>
	</div>
    <hr>
    @endforeach
	<!-- ticket post end -->	

	<div class="columns twelve ticket-insert nine">
	<h5>Photo Log</h5>

		<div class='list-group gallery nine'>
		@if(  $galleries->count() === 0 )
		<ul style="margin-bottom: 21px">
		<li>No recent upload</li></ul>
		@else 
		<ul style="margin-bottom: 21px">
		<li>Recent upload on {{ $galleries->last()->updated_at }}</li></ul>
		@endif
			@if($galleries->count())
				@foreach($galleries as $image)
				<div style="margin: 0 auto" class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
					<a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
						<img style="display:block; height: 150px" class="img-responsive" alt="" src="/images/{{ $image->image }}" />
							<div class='text-center'>
								<small class='text-muted'>{{ $image->title }}</small>
							</div> <!-- text-center / end -->
					</a>
					<form action="{{ url('/image-gallery',$image->id) }}" method="POST">
						<input type="hidden" name="_method" value="delete">
						{!! csrf_field() !!}
						<button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
					</form>
				</div> <!-- col-6 / end -->
				@endforeach
			@endif

		</div> <!-- list-group / end -->

	</div> <!-- row / end -->	
	<hr style="border-top: 3px solid">

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
                        @if( Auth::user()->user_group == 1)
                            <li>Administrator</li>
                        @else
                            <li>General User</li>
                        @endif
						<!--<li><a href="#">Edit Account</a></li>-->
					</ul>
				</div>
			</div>
            @if($ticketlog->resolved == 0)
            <div class="columns nine">
                <form id="reply" method="POST" action="/add_replies/{{ $ticket_id }}">
                @csrf
                    <textarea id="rtext" name="ticket_reply" class="u-full-width" placeholder="Enter your reply..."></textarea>
                    <button type="submit">Add Reply</button>
                </form>
            
				<div class="row">
					<form action="/{{ $ticket_id }}/image-gallery" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}

							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

							@if ($message = Session::get('success'))
							<div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>{{ $message }}</strong>
							</div>
							@endif

							<div class="row">
								<div class="col-md-5">
									<strong>Image Title:</strong>
									<input type="text" name="title" class="form-control" placeholder="Title">
								</div>

								<div class="col-md-5">
									<strong>File:</strong>
									<input type="file" name="image" class="form-control">
									<input class="hidden" value="{{ $ticket_id }}" type="text" name="ticket_uid" class="form-control">
								</div>

								<div class="col-md-2">
									<br/>
									<button type="submit" class="btn btn-success">Upload</button>
								</div>
							</div>
					</form>
				</div>	
			</div>

            @else
            <div class="columns nine">
                @if(Auth::user()->user_group == 0)
                    <div class="alert warning">This ticket has been closed, please open another support ticket for further support.</div>
                @else
                    <div class="alert warning">This ticket has been closed.</div>
                @endif
                <!--<form>
                    <textarea id="rtext" class="u-full-width" disabled placeholder="Enter your reply..."></textarea>
                    <button disabled>Add Reply</button>
                </form>-->
            </div>

        </div>
        @endif
    </div>

</div>
<hr>



</div>
<div style="margin-top:100px;display: block;"><!-- space acting footer --></div>

@endsection

@push('scripts')
       <script src="js/functions.js"></script>
@endpush
	

