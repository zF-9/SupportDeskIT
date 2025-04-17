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
        $userId = Auth::user()->id;

        $userAccess = Auth::user()->user_group; #check user access

        $tickets = DB::table('tickets')->join('users', 'users.id', 'tickets.user_id')->get();
        $user_tickets = $tickets->where('user_id', $userId );
        $department = DB::table('departments')->get();

        return view('admindash', ['ticket'=>$tickets, 'own_ticket'=>$user_tickets, 'id'=>$userId, 'access'=>$userAccess, 'departments'=>$department] );
    }
}
