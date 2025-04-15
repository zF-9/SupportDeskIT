<ul>
	<li class="profile">
		<div class="row">
			<div class="three columns">

			</div>
			<div class="nine columns">
				<b>{{ Auth::user()->name }}</b><br>
				Administrator<br>
				<a href="/home" class="active"><span class="entypo-left-open"></span>User Panel</a>
			</div>
		</div>
		</li>
		<a href="/home" >
		<li>
			Admin Dashboard
			<p>Overview of site statistics</p>
		</li></a>
		<a href="/manage_ticket">
		<li>
			Tickets Management
			<p>View, answer and resolve tickets created.</p>
		</li></a>
		<a href="/user_management">
		<li>
			User Management
			<p>Monitor and modify user accounts</p>
		</li></a>
		<a href="/manage_site">
		<li>
			Site Management
			<p>Modify sites default settings</p>
		</li></a>
</ul>

