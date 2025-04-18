<?php

namespace App\Http\Controllers;

use DB;
use App\Models\department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
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
        $add_section = new department;

        $add_section->name = request('department');
        $add_section->hidden = 0;

        $add_section->save();

        $active_dept = DB::table('departments')->get();
        return view('site_manager')->with(['department'=>$active_dept]);
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
    public function show(department $department)
    {
        //
        $active_dept = DB::table('departments')->get();
        #dd($active_dept);

        #return view('site_manager')->with(['department'=>$active_dept]);
        return view('site_manager')->with(['department'=>$active_dept]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department $department)
    {
        //
        #$dept_name = request();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, department $department)
    {
        //
    }

    public function manage_dept($dept_id){
        $target_dept = department::where('id', $dept_id)->first();
        #dd($target_dept);

        return view('edit_department')->with(['t_dept'=>$target_dept]);
    }

    public function update_dept(Request $request, $dept_id) {
        $target_dept = department::find($dept_id);
        $placeholder = request('update_dept');
        #dd($target_dept);

        $target_dept->name = $placeholder;
        $target_dept->save();

        $active_dept = DB::table('departments')->get();
        return view('site_manager')->with(['department'=>$active_dept]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(department $department)
    {
        //
    }
}
