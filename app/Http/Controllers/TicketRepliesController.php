<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\ticket_replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TicketRepliesController extends Controller
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
    public function create($uuid)
    {
        //
        $dt = new Carbon();
        $userId = Auth::user()->id;

        $reply_ticket = new ticket_replies;
        #dd($uuid);
        $reply_ticket->user = $userId;
        $reply_ticket->text = request('ticket_reply');
        $reply_ticket->ticket_id = $uuid;
        $reply_ticket->created_at = $dt;
        $reply_ticket->save();

       return redirect()->back(); 
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
    public function show(ticket_replies $ticket_replies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ticket_replies $ticket_replies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ticket_replies $ticket_replies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ticket_replies $ticket_replies)
    {
        //
    }
}
