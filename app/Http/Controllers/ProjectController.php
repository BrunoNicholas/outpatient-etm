<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\DiseaseCase;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate();
        return view('p_n_o.projects.index',compact(['projects']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects   = Project::all();
        $cases      = DiseaseCase::all();
        return view('p_n_o.projects.create',compact(['projects','cases']));
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
            'project_name'      => 'required',
            'disease_case_id'   => 'required',
            'user_id'           => 'required',
            'start_date'        => 'required',
            'status'            => 'required',
        ]);

        Project::create($request->all());
        return redirect()->route('projects.index')->with('success','New project saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return back()->with('danger', 'Sorry, this project must either be deleted for not available');
        }
        return view('p_n_o.projects.show', compact(['project']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project    = Project::find($id);
        $cases      = DiseaseCase::all();
        if (!$project) {
            return back()->with('danger', 'Sorry, this project must either be deleted for not available');
        }
        return view('p_n_o.projects.edit', compact(['project','cases']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'project_name'      => 'required',
            'disease_case_id'   => 'required',
            'user_id'           => 'required',
            'start_date'        => 'required',
            'status'            => 'required',
        ]);

        Project::find($id)->update($request->all());
        return redirect()->route('projects.index')->with('success','Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Project::find($id);
        $item->delete();
        return redirect()->route('projects.index')->with('danger', 'Project deleted successfully!');
    }
}
