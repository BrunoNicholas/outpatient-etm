<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\User;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $leaves = Leave::all();
        return view('p_n_o.leaves.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        $users = User::all();
        return view('p_n_o.leaves.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = Leave::find($id);
        if (!$leave) {
            return back('warning','The disease record you seek is either missing or deleted!');
        }
        return view('p_n_o.leaves.show',compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::find($id);
        if (!$leave) {
            return back('warning','The disease record you seek is either missing or deleted!');
        }
        return view('p_n_o.leaves.edit',compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave Deleted Successfully!');
    }
}
