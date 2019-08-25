<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Role;
use App\User;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('admin.users.index', compact(['users','roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
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
            'name'      => 'required',
            'email'     => 'required',
            'telephone' => 'required',
            'role'      => 'required',
            'status'    => 'required',

        ]);
        $user = User::create($request->all());

        DB::table('role_user');

        $user->attachRole(Role::where('name',($request->role))->first());

        return redirect()->route('users.index')->with('success','User Profile Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
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
            'name'      =>  'required',
            'email'     =>  'required',
            'telephone' =>  'required',
            'role'      =>  'required',
        ]);
        
        User::find($id)->update($request->all());
        
        $user = User::find($id);

        DB::table('role_user')->where('user_id',$id)->delete();

        $user->attachRole(Role::where('name',($request->role))->first());

        return redirect()->route('users.index')->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Profile Deleted Successfully');
    }
}
