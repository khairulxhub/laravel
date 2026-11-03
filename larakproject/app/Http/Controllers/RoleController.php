<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // $role = Role::all()->toArray();
        $role = Role::latest()->get();  //decending 
        // dd($role);
        // return view('admin.role.manage');
        return view('admin.role.manage', compact('role'));
    }
    public function create()
    {
        return view('admin.role.create');
    }
    public function edit()
    {
        return view('admin.role.update');
    }
}
