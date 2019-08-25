<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Chat;
use App\User;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::latest()->paginate();
        $roles = Role::latest()->paginate();
        return View('admin.index',compact(['users','roles']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perms()
    {
        $permissions = Permission::all();
        return views('admin.roles.perms',compact('permissions'));
    }
}
