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
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $input['title'] = $request->title;
        TicketGallery::create($input);

    	return back()->with('success','Image Uploaded successfully.');
    } 

    public function destroy($id)
    {
    	TicketGallery::find($id)->delete();
    	return back()->with('success','Image removed successfully.');	
    }     
}
