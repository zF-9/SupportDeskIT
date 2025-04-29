@extends('layouts.header')

@section('content')
<div style="margin-top:5%;display: block;"><!-- space acting nav --></div>

<div class="container">
	<div class="row">
		<div class="six offset-by-three columns auth-section">
			<h4>Sign in</h4>
			<p>Using the form below please enter your email address and password and we'll get started.</p>

			<form id="auth" method="POST" action="{{ route('login') }}">
            	@csrf
				<!--<div class="row">
					<div class="six columns">
					    <input type="radio" id="radio1" name="radio_btn" value="returning_user" checked="checked">
	    				<label class="user-type" for="radio1">
	    					<b>Returning User</b>
	    					<p>If you are registered before please sign in below.</p>
	    				</label>
    				</div>
				
					<div class="six columns">
					    <input type="radio" id="radio2" name="radio_btn" value="new_user">
	    				<label class="user-type" for="radio2">
	    					<b>New User</b>
	    					<p>If you're not already signed up then you'll need to do so</p>
	    				</label>
    				</div>
				</div>-->

				<div id="login" class="content">
					<label for="email">Email Address</label>
					<!--<input class="u-full-width" type="email" name="email_log" required autocomplete="off" placeholder="you@domain.com" id="email_log">-->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror u-full-width" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
					
					<label for="password">Password</label>
					<!--<input class="u-full-width" type="password" name="password_log" required placeholder="Keep it secure" id="password_log">-->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror u-full-width" name="password" required autocomplete="current-password">

					<button class="button" name="submit" type="submit">Authenticate</button>
					<button class="button" name="back" type="back" onClick="window.location.href='../';">Back</button>
				</div>
			</form>
			
		</div>
	</div>
</div>

@push('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('input[name="radio_btn"]').click(function () {
                const selectedValue = $(this).val();
                $(".content").hide(); // Hide all divs
                $("." + selectedValue).show(); // Show the selected div
            });
        });
	</script>
@endpush

@push('page-scripts')
    <script type="text/javascript" src="{{ URL::asset('js/foot.js') }}"></script>
@endpush

</body>
@endsection




