<?php

namespace App\Http\Controllers;

use App\Models\tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        #$active_user = DB::table('users')->get();
        #dd($active_user);
        #return view('home', compact('active_user'));
        $userId = Auth::user()->name;
        $userAccess = Auth::user()->user_group;
        //dd($userAccess);

        $tickets = DB::table('tickets')->join('users', 'users.id', 'tickets.user_id')->get();
        $department = DB::table('departments')->get();
        //dd($tickets);
        return view('admindash', ['ticket'=>$tickets, 'id'=>$userId, 'access'=>$userAccess, 'departments'=>$department] );
    }
}
