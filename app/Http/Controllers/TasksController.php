<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Project;
use App\User;
use App\Models\Team;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasks::latest()->paginate();
        return view('p_n_o.tasks.index',compact(['tasks']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks      = Tasks::all();
        $projects   = Project::all();
        $teams      = Team::all();
        return view('p_n_o.tasks.create',compact(['tasks','projects','teams']));
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
            'name'     => 'required',
            'project_id'       => 'required',
            'team_id'        => 'required',
            'user_id'        => 'required',
            'topic'        => 'required',
            'status'        => 'required',
        ]);

        Tasks::create($request->all());
        return redirect()->route('tasks.index')->with('success','New task saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Tasks::find($id);
        if (!$task) {
            return back()->with('warning','Sorry, This task might be deleted or is missing!');
        }
        return view('p_n_o.tasks.show',compact(['task']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Tasks::find($id);
        $projects   = Project::all();
        $teams      = Team::all();
        if (!$task) {
            return back()->with('warning','Sorry, This task might be deleted or is missing!');
        }
        return view('p_n_o.tasks.show',compact(['task','projects','teams']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name'     => 'required',
            'project_id'       => 'required',
            'team_id'        => 'required',
            'user_id'        => 'required',
            'topic'        => 'required',
            'status'        => 'required',
        ]);
        Tasks::find($id)->update($request->all());
        return redirect()->route('tasks.index')->with('success','Project task has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tasks::find($id);
        $item->delete();
        return redirect()->route('tasks.index')->with('danger', 'Team deleted successfully!');
    }
}
