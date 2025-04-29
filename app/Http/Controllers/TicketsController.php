<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\tickets;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TicketGallery;
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
        $userAccess = Auth::user()->user_group; #check user access

        return view('admin_panel')->with(['access'=>$userAccess, 'active'=>$active_list, 'users'=>$active_users, 'isAdmin'=>$admin_user, 'dept'=>$active_dept, 'open'=>$open_ticket, 'unanswer'=>$unanswer_ticket, 'resolved'=>$resolved_ticket, 'datetime'=>$dt]); 
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

    public function tickets_manager() {
        $userId = Auth::user()->id;
        $userAccess = Auth::user()->user_group; #check user access
        $tickets_view = DB::table('Tickets')->join('users', 'users.id', 'tickets.user_id')->get();
        $user_tickets = $tickets_view->where('user_id', $userId );

        $all_replies = DB::table('ticket_replies')->join('tickets', 'tickets.uniqid', 'ticket_replies.ticket_id')->get();
        $images = TicketGallery::get();
        if( isset($images) ){
            #$latest_img = $images->first()->updated_at;
        } 
        #dd($latest_img);

        return view('ticket_manager')->with(['ticket'=>$tickets_view, 'own_ticket'=>$user_tickets, 'id'=>$userId, 'access'=>$userAccess, 'images'=>$images]);
    }

    public function ticket_view(Request $request, $ticket_uuid) {
        
        $current_viewer = Auth::user()->id; 
        $userAccess = Auth::user()->user_group; #check user access
        $ticket_log = DB::table('tickets')->where('uniqid',$ticket_uuid)->join('users', 'users.id', 'tickets.user_id')->first();

        if($userAccess == 1) {
            $target_ticket = DB::table('tickets')->where('uniqid',$ticket_uuid)->join('users', 'users.id', 'tickets.user_id')->update(['admin_read'=>1]);
        }
        else {
            
        }
        
        $uuid = $ticket_log->uniqid;
        $galleries = TicketGallery::where('ticket_uid', $uuid)->get();

        $replies = DB::table('ticket_replies')->where('ticket_id',$uuid)->join('users', 'users.id', 'ticket_replies.user')->get();
        $last_reply = $replies->sortByDesc('updated_at')->first();
        #$latest_img = $images->first()->updated_at;
        #dd($replies);

        return view('ticket_viewer')->with(['ticketlog'=>$ticket_log, 'access'=>$userAccess, 'ticket_id'=>$uuid, 'respond'=>$replies, 'galleries'=>$galleries]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tickets $tickets)
    {
        //
    }
}
