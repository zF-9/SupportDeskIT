<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\tickets;
use Illuminate\Http\Request;
use App\Models\short_messages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcomeback');
})->name('landingpage');

Route::post('/send_message', function() {
    $dt = new Carbon();
    $new_message = new short_messages;
    $new_message->name = request('name');
    $new_message->email = request('email');
    $new_message->message = request('message');

    $new_message->save();
    return redirect()->route('landingpage');
})->name('short_message');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/ticketopen', [App\Http\Controllers\TicketsController::class, 'create'])->name('OpenTicket');

Route::get('/manage_site', [App\Http\Controllers\DepartmentController::class, 'show'])->name('site_manager');
Route::post('/new_section', [App\Http\Controllers\DepartmentController::class, 'create'])->name('addSection');
Route::get('/manage_dept/{dept_id}', [App\Http\Controllers\DepartmentController::class, 'manage_dept'])->name('dept_manager');
Route::post('/update_dept/{dept_id}', [App\Http\Controllers\DepartmentController::class, 'update_dept'])->name('update_manager');

Route::get('/overview', [App\Http\Controllers\TicketsController::class, 'show'])->name('overview');

Route::get('/{uuid}/view_ticket', [App\Http\Controllers\TicketsController::class, 'ticket_view'])->name('ViewTicket');
Route::get('/manage_ticket', [App\Http\Controllers\TicketsController::class, 'tickets_manager'])->name('ManageTickets');

Route::get('/user_management', [App\Http\Controllers\AdminSettingsController::class, 'show'])->name('user_management');
Route::get('/{id}/edit_user', [App\Http\Controllers\AdminSettingsController::class, 'scope_user'])->name('edit_user');

Route::post('/{user_id}/deny', [App\Http\Controllers\AdminSettingsController::class, 'revoke_access'])->name('revoke_access');
Route::post('/{user_id}/enact', [App\Http\Controllers\AdminSettingsController::class, 'enact_access'])->name('enact_access');

Route::post('/add_replies/{uuid}', [App\Http\Controllers\TicketRepliesController::class, 'create'])->name('reply_ticket');


Route::get('image-gallery', [App\Http\Controllers\TicketGalleryController::class, 'index']);
Route::post('/{uid}/image-gallery', [App\Http\Controllers\TicketGalleryController::class, 'upload']);
Route::delete('image-gallery/{id}', [App\Http\Controllers\TicketGalleryController::class, 'destroy']);

Route::get('/admin_dash', function () {
    $active_list = DB::table('tickets')->get();
    #dd($active_list);
    return view('admindash');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('landingpage');
})->name('logout');

#route cuba-try-tester
/*Route::get('/manage_ticket', function() {
    $tickets_view = DB::table('Tickets')->join('users', 'users.id', 'tickets.user_id')->get();
    #dd($tickets_view);
    return view('ticket_manager')->with(['ticket'=>$tickets_view]);
});*/

/*Route::get('/viewticket', function() {
    $tickets_view = DB::table('Tickets')->join('users', 'users.id', 'tickets.user_id')->get();
    #dd($tickets_view);
    return view('ticket_manager')->with(['ticket'=>$tickets_view]);
});*/