<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\tickets;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $dt = new Carbon();
        $userId = Auth::user()->id;
        $uuid = Str::uuid()->toString();

        $open_ticket = new tickets;

        $open_ticket->user_id = $userId;
        $open_ticket->uniqid = $uuid;
        $open_ticket->init_msg = request('message');
        $open_ticket->department_id = request('department');
        $open_ticket->title = request('subject');
        $open_ticket->created_at = $dt;

        $open_ticket->save();

        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tickets $tickets)
    {
        //
        $dt = new Carbon();

        $active_list = DB::table('tickets')->get();
        $active_users = DB::table('users')->get();
        $active_dept = DB::table('departments')->get();

        $admin_user = DB::table('users')->where('user_group','=', 1)->get();
        $open_ticket = tickets::whereNotNull('uniqid')->get(); 
        $unanswer_ticket = DB::table('tickets')->where('admin_read','=', 0)->get();
        $resolved_ticket = DB::table('tickets')->where('resolved','=', 1)->get();

        //dd($tz);

        return view('admin_panel')->with(['active'=>$active_list, 'users'=>$active_users, 'isAdmin'=>$admin_user, 'dept'=>$active_dept, 'open'=>$open_ticket, 'unanswer'=>$unanswer_ticket, 'resolved'=>$resolved_ticket, 'datetime'=>$dt]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tickets $tickets)
    {
        //
    }

    public function ticket_view($ticket_uuid) {
        #$current_viewer = Auth::user()->id; 
        $ticket_log = DB::table('tickets')->where('uniqid',$ticket_uuid)->join('users', 'users.id', 'tickets.user_id')->first();
        //dd($ticket_log);

        return view('ticket_viewer')->with(['ticketlog'=>$ticket_log]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tickets $tickets)
    {
        //
    }
}
