@extends('layouts.header')




@section('content')
<div style="margin-top:5%;display: block;"><!-- space acting nav --></div>

<div class="container">
	<div class="row">
		<div class="six offset-by-three columns auth-section">
			<h4>Sign in or Register</h4>
			<p>Using the form below please enter your email address and password and we'll get started.</p>

			<form id="auth" method="POST" action="{{ route('register') }}">
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
						
				<div id="register" class="content">
					<span id="alerts"></span>
					<label for="name">Name</label>
					<!--<input class="u-full-width" type="text" name="nsmr" required autocomplete="off" placeholder="Name" id="name" value="{{ old('name') }}">-->
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror u-full-width" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

					<label for="email">Email Address</label>
					<!--<input class="u-full-width" type="email" name="email" required autocomplete="off" placeholder="you@domain.com" id="email">-->
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror u-full-width" name="email" value="{{ old('email') }}" required autocomplete="email">
					
					<label for="password">Password</label>
					<!--<input class="u-full-width" type="password" name="password" required placeholder="Keep it secure" id="password">-->
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror u-full-width" name="password" required autocomplete="new-password">

					<label for="password-confirm">Password</label>
					<!--<input class="u-full-width" type="password" name="password_confirmation" required placeholder="Keep it securer" id="password-confirm">-->
					<input id="password-confirm" type="password" class="form-control u-full-width" name="password_confirmation" required autocomplete="new-password">
					
					<button class="button" name="submit" type="submit">Register</button>
					<button class="button" name="back" type="back" onClick="window.location.href='../';">Back</button>
				</div>

				<!--<div id="login" class="content">
					<label for="email">Email Address</label>
					<input class="u-full-width" type="email" name="email_log" required autocomplete="off" placeholder="you@domain.com" id="email_log">
					
					<label for="password">Password</label>
					<input class="u-full-width" type="password" name="password_log" required placeholder="Keep it secure" id="password_log">

					<button class="button" name="submit" type="submit">Login</button>
					<button class="button" name="back" type="back" onClick="window.location.href='../';">Back</button>
				</div>-->
			</form>
			
		</div>
	</div>
</div>




</body>
@endsection

@push('scripts')
       <script src="js/functions.js"></script>
@endpush

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


