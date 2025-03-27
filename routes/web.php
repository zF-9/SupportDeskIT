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

Route::get('/manage_site', [App\Http\Controllers\departmentController::class, 'show'])->name('site_manager');
Route::post('/new_section', [App\Http\Controllers\departmentController::class, 'create'])->name('addSection');

Route::get('/overview', [App\Http\Controllers\TicketsController::class, 'show'])->name('overview');

Route::get('/admin_dash', function () {
    $active_list = DB::table('tickets')->get();
    #dd($active_list);
    return view('admindash');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('landingpage');
})->name('logout');

/*Route::get('/manage_site', function() {
    return view('site_manager');
});*/