<?php

namespace App\Http\Controllers;
use App\Models\TicketGallery;
use Illuminate\Http\Request;

class TicketGalleryController extends Controller
{
    public function index()
    {
    	$images = TicketGallery::get();
    	return view('ticket_gallery',compact('images'));
    }

    public function upload(Request $request)
    {
        #dd($ticket_id);
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ticket_uid' => 'required',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $input['ticket_uid'] = $request->ticket_uid;
        $input['title'] = $request->title;
        #dd($input);
        TicketGallery::create($input);

    	return back()->with('success','Image Uploaded successfully.');
        #fix here uuid not recorded in the ticket gallery fixtures
    } 

    public function destroy($id)
    {
    	TicketGallery::find($id)->delete();
    	return back()->with('success','Image removed successfully.');	
    }     
}
