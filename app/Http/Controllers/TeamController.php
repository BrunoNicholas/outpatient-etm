<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:super-admin|admin|editor')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate();
        return view('p_n_o.teams.index',compact(['teams']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::latest()->paginate();
        return view('p_n_o.teams.create',compact(['teams']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'team_name'     => 'required',
            'user_id'       => 'required',
            'status'        => 'required',
        ]);

        Team::create($request->all());
        return redirect()->route('teams.index')->with('success','New team has been saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return back()->with('danger','Sorry, This team might be deleted or is missing!');
        }
        return view('p_n_o.teams.show',compact('team')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return back()->with('danger','Sorry, This team might be deleted or is missing!');
        }
        return view('p_n_o.teams.edit',compact('team'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'team_name'     => 'required',
            'user_id'       => 'required',
            'status'        => 'required',
        ]);

        Team::find($id)->update($request->all());
        return redirect()->route('teams.index')->with('success','Group team has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Team::find($id);
        $item->delete();
        return redirect()->route('teams.index')->with('danger', 'Team deleted successfully!');
    }
}
