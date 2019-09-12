<?php

namespace App\Http\Controllers;

use App\Models\DiseaseCase;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseCaseController extends Controller
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
        $cases = DiseaseCase::all();
        return view('system.cases.index',compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diseases = Disease::all();
        return view('system.cases.create',compact(['diseases']));
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
            'case_name'     => 'required',
            'disease_id'    => 'required',
            'status'    => 'required',
        ]);

        DiseaseCase::create($request->all());
        return redirect()->route('cases.index')->with('success','Disease case record added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiseaseCase  $diseaseCase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $case = DiseaseCase::find($id);
        if (!$case) {
            return back()->with('warning', 'The disease case you look for is either missing or deleted!')
        }
        return view('system.cases.show',compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiseaseCase  $diseaseCase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $case = DiseaseCase::find($id);
        $diseases = Disease::all();
        if (!$case) {
            return back()->with('warning', 'The disease case you look for is either missing or deleted!')
        }
        return view('system.cases.edit',compact(['case','diseases']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DiseaseCase  $diseaseCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'case_name'     => 'required',
            'disease_id'    => 'required',
            'status'    => 'required',
        ]);

        DiseaseCase::find($id)->update($request->all());
        return redirect()->route('cases.index')->with('success','Disease case record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiseaseCase  $diseaseCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiseaseCase $id)
    {
        $case = DiseaseCase::find($id);
        $case->delete();
        return redirect()->route('cases.index')->with('success', 'Case Deleted Successfully!');
    }
}
