<?php

namespace App\Http\Controllers;

use DB;
use App\Models\tickets;
use App\Models\admin_settings;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminSettingsController extends Controller
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
    public function create()
    {
        //
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
    public function show(admin_settings $admin_settings)
    {
        //
        $all_user = DB::table('users')->get();
        
        return view('user_management_menu')->with(['show_user'=>$all_user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin_settings $admin_settings)
    {
        //
        $all_user = DB::table('users')->get();
        
        return view('user_management_edit')->with(['show_user'=>$all_user]);
    }

    public function scope_user($user_id)
    {
        $userId = Auth::user()->id;
        $target_user = user::where('id', $user_id)->first();
        $userAccess = Auth::user()->user_group; #check user access
        $user_activity = DB::table('tickets')->join('users', 'users.id', 'tickets.user_id')->where('user_id', $user_id)->get();

        $session_t = DB::table('sessions')->where('user_id', $userId)->selectRaw('*, FROM_UNIXTIME(last_activity) as last_activity_datetime')->get();
        $unanswer_ticket = $user_activity->where('admin_read', 0)->count();
        $resolved_ticket = $user_activity->where('resolved', 1)->count();
        $login_time = $session_t->pluck('last_activity_datetime');
        $ip_session = $session_t->pluck('ip_address');

        return view('user_management_edit')
        ->with(['user_scope'=>$target_user, 'access'=>$userAccess, 'activity'=>$user_activity, 'session'=>$session_t, 'login_t'=>$login_time, 'unread'=>$unanswer_ticket, 'res'=>$resolved_ticket, 'login_s'=>$ip_session]);
    }

    public function revoke_access($revoke_user) {
        $denied = user::where('id', $revoke_user)->first();

        $denied->user_group = 0;
        $denied->save();

        return redirect()->route('overview');
    }

    public function enact_access($enact_user) {
        $enact = user::where('id', $enact_user)->first();

        $enact->user_group = 1;
        $enact->save();

        return redirect()->route('overview');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin_settings $admin_settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin_settings $admin_settings)
    {
        //
    }
}
