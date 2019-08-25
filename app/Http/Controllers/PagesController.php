<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\User;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lock($id)
    {
    	$user = User::find($id);
    	return view('web.lock',compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unlock(Request $request)
    {
        $user = User::where('email', $request->email);
        if (bcrypt($request->password) == $user->password) {
        	return redirect()->route('home')->with('success', 'Session unlocked successfully!');
        }
        else{
        	return redirect()->route('logout');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::find($id);
        $chats = Chat::all();
        return view('user.settings.profile',compact(['user','chats']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function messaging($id)
    {
        $user = User::find($id);
        $messages = Chat::all();
        return view('user.messages.index',compact(['user','messages']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tracker()
    {
        return view('p_n_o.logs.tracker');
    }
}
