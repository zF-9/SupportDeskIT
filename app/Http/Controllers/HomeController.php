<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\tickets;
use Illuminate\Http\Request;
use App\Models\short_messages;
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

        $replies = DB::table('ticket_replies')->join('tickets', 'tickets.uniqid', 'ticket_replies.ticket_id')->get();
        $last_reply = $replies->sortByDesc('updated_at')->first();

        #$test = DB::table('tickets')->join('tickets', 'tickets.uniqid', 'ticket_replies.ticket_id')->join('users', 'users.id', 'tickets.user_id')->get();

        #dd($test);

        return view('admindash', ['ticket'=>$tickets, 'own_ticket'=>$user_tickets, 'id'=>$userId, 'access'=>$userAccess, 'departments'=>$department, 'last_reply'=>$replies] );
    }

    public function short_message() {
        $dt = new Carbon();

        $new_message = new short_messages;

        $new_message->name = request('name');
        $new_message->email = request('email');
        $new_message->message = request('message');

        $new_message->save();

        return redirect()->route('landingpage');
    }
}
