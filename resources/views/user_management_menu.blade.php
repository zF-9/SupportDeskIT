@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
		<div class="four columns admin-menu">
		    @include('layouts.admin_sidemenu')
		</div>

            <div class="columns eight user_management">
                <table class="u-full-width" id="update">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nickname</th>
                            <th>Email Address</th>
                            <th>.</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($show_user as $key=> $users)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td><a href="/{{ $users->id }}/edit_user"><span class="entypo-cog"></span></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    

<div style="margin-top:100px;display: block;"><!-- space acting footer --></div>

@endsection

@push('scripts')
       <script src="js/functions.js"></script>
@endpush
