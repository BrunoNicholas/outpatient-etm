<?php

namespace App\Http\Controllers;

use App\Models\PatternTrack;
use Illuminate\Http\Request;

class PatternTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trackers = PatternTrack::latest()->paginate(50);
        return view('system.pattern_tracker.index',compact('trackers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trackers = PatternTrack::latest()->paginate(100);
        return view('system.pattern_tracker.create',compact('trackers'));
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
     * @param  \App\Models\PatternTrack  $patternTrack
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $track = PatternTrack::find($id);
        if (!$track) {
            return back()->with('warning','The tracker record you look for is either missing or deleted!');
        }
        return view('system.pattern_tracker.show',compact(['track']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatternTrack  $patternTrack
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $track = PatternTrack::find($id);
        if (!$track) {
            return back()->with('warning','The tracker record you look for is either missing or deleted!');
        }
        return view('system.pattern_tracker.edit',compact(['track']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatternTrack  $patternTrack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatternTrack  $patternTrack
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $track = PatternTrack::find($id);
        $track->delete();
        return redirect()->route('tracker.index')->with('success', 'Track deleted successfully!');
    }
}
