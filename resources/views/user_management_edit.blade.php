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

            <div class="columns eight admin-edit-user">
                <h4>Edit user account</h4>
                <span id="errors"></span>
                <table class="u-full-width">
                    <thead>
                        <tr>
                            <th>Type</th>

                            <th>Data</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Unique ID</td>

                            <td>{{ $user_scope->id }}</td>
                        </tr>

                        <tr>
                            <td>Nickname</td>

                            <td>{{ $user_scope->name }}</td>
                        </tr>

                        <tr>
                            <td>Email Address</td>

                            <td>{{ $user_scope->email }}</td>
                        </tr>

                        <tr>
                            <td>Registered</td>

                            <td>{{ $user_scope->created_at }}</td>
                        </tr>

                        <tr>
                            <td>Last Login</td>
                            <td>{{ $login_t[0] }}</td>
                        </tr>

                        <tr>
                            <td>Number of Tickets Open</td>

                            <td>{{ $activity->count() }}</td>
                        </tr>

                        <tr>
                            <td>Number of Tickets Resolved</td>
                            <td>{{ $res }}</td>
                        </tr>

                        <tr>
                            <td>Number of Tickets Unanswered</td>
                            <td>{{ $unread }}</td>
                        </tr>
                        
						<tr>
                            <td>Most Recent IP</td>
                            <td>{{ $login_s[0] }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="columns four">
                        <label for="nickname">Nickname</label>
                    </div>

                    <div class="columns six">
                        <input type="text" id="nickname" autocomplete="off" placeholder="Modify Nickname" value="{{ $user_scope->name }}" class="u-full-width">
                    </div>

                    <div class="columns two">
                        <button id="admin_update_nickname" class="button button-blank u-full-width">Update</button>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="columns four">
                        <label for="email">Email Address</label>
                    </div>
                    <div class="columns six">
                        <input type="text" id="email" autocomplete="off" placeholder="Modify Nickname" value="{{ $user_scope->email }}" class="u-full-width">
                    </div>

                    <div class="columns two">
                        <button id="admin_update_email" class="button button-blank u-full-width">Update</button>
                    </div>
                </div>

            @if ( $access == true )
                <div class="row">
                    <div class="columns four">
                        Actions
                    </div>

                    <div class="columns four">
                        @if( $user_scope->user_group == 1 )
                            <button class="button u-full-width" disabled>User is admin</button>
                        @else
                        <form method="POST" id="access_enact" action="/{{ $user_scope->id }}/enact">
                        @csrf
                            <button class="button u-full-width" id="make_admin">Make Admin</button>
                        </form>
                        @endif
                    </div>
                    <div class="columns four">
                    <form method="POST" id="access_denied" action="/{{ $user_scope->id }}/deny">
                    @csrf
                        <!--<button class="button u-full-width" id="change_access">Access denied</button>-->
                        <button class="button u-full-width" id="change_access">Don't Allow Access</button>
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
