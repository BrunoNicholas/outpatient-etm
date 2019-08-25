<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.messages.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->receiver_id);

        request()->validate([
            'sender_id'     =>  'required',
            'receiver_id'   =>  'required',
            'topic'         =>  'required',
            'description'   =>  'required',
            'rec_email'     =>  $user->email,
            'sen_name'      =>  'required',
            'sen_email'     =>  'required',
            'sending_profile'   =>  'required',
            'receiving_profile' =>  $user->role,
        ]);

        Chat::create($request->all());
        return redirect()->route('home')->with('success', 'Message sent successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chat_msg = Chat::find($id);
        return $chat_msg;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'sender_id'     =>  'required',
            'receiver_id'   =>  'required',
            'topic'         =>  'required',
            'description'   =>  'required',
            'rec_email'     =>  'required',
            'sen_name'      =>  'required',
            'sen_email'     =>  'required',
            'sending_profile'   =>  'required',
            'receiving_profile' =>  'required',
        ]);

        Chat::find($id)->update($request->all());
        return redirect()->route('home')->with('success', 'Message updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat_msg = Chat::find($id);
        $chat_msg->delete();
        $success = 'Message has been deleted Successfully! You can go back you were.';
        return redirect()->route('home')->with('success', $success);
    }
}
