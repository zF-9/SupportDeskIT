<?php
 
use App\Models\User;
use App\Models\tickets;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcomeback');
})->name('landingpage');

/*Route::get('/loginer', function () {
    return view('auth.signin');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/ticketopen', [App\Http\Controllers\TicketsController::class, 'create'])->name('OpenTicket');

Route::get('/manage_site', [App\Http\Controllers\DepartmentController::class, 'show'])->name('site_manager');
Route::post('/new_section', [App\Http\Controllers\DepartmentController::class, 'create'])->name('addSection');
Route::get('/manage_dept/{dept_id}', [App\Http\Controllers\DepartmentController::class, 'manage_dept'])->name('dept_manager');
Route::post('/update_dept/{dept_id}', [App\Http\Controllers\DepartmentController::class, 'update_dept'])->name('update_manager');

Route::get('/overview', [App\Http\Controllers\TicketsController::class, 'show'])->name('overview');

Route::get('/{uuid}/view_ticket', [App\Http\Controllers\TicketsController::class, 'ticket_view'])->name('ViewTicket');

Route::get('/user_management', [App\Http\Controllers\AdminSettingsController::class, 'show'])->name('user_management');
Route::get('/{id}/edit_user', [App\Http\Controllers\AdminSettingsController::class, 'scope_user'])->name('edit_user');

Route::post('/{user_id}/deny', [App\Http\Controllers\AdminSettingsController::class, 'revoke_access'])->name('revoke_access');
Route::post('/{user_id}/enact', [App\Http\Controllers\AdminSettingsController::class, 'enact_access'])->name('enact_access');

Route::get('manage_ticket', [App\Http\Controllers\TicketsController::class, 'tickets_manager'])->name('ManageTickets');

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