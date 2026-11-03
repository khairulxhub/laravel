<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Role::all();
        // $roles = DB::table('roles')->get();
        // $roles = DB::table('roles')->paginate(2);
        // $roles = DB::table('roles')->where('name', 'admin')->first();
        // $roles = DB::table('users')->latest()->get();
        // $roles = DB::table('users')->oldest()->get();
        // $roles = DB::table('roles')->offset(2)->limit(2)->get();
        // $roles = DB::table('roles')->count('id');
        // $roles = DB::table('products')->avg('price');
        // $roles = DB::table('products')->min('price');
        // $roles = DB::table('products')->select('name', 'price')->get();
        // $roles = DB::table('products as p')
        //         ->join('categories as c', 'p.category_id', '=', 'c.id')
        //         ->join('brands as b', 'p.brand_id', '=', 'b.id')
        //         ->select('p.name', 'c.name as category', 'b.name as brand', 'p.price')
        //         ->get();
        
        // role     no_of_users
        // ----------------------
        // Admin    5
        // Vendor   10
        
        // $roles = DB::table('roles as r')
        //         ->join('users as u', 'r.id', '=', 'u.role_id')
        //         ->select('r.name as role', DB::raw('count(u.id) as no_of_users'))
        //         ->groupBy('role')
        //         ->get();
        // $roles = DB::table('roles as r')
        //         ->join('users as u', 'r.id', '=', 'u.role_id')
        //         ->select('r.name as role')
        //         ->selectRaw('COUNT(u.id) as no_of_users')
        //         ->groupBy('role')
        //         ->toSql();
        
        $roles = DB::table('roles')->orderBy('name','asc')->get();
        // dd($roles);
        return view('admin.pages.role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|unique:roles,name|min:3|max:100'
      ]);
      $roles = DB::table('roles')->insert([
          
          'name' => $request->name
      ]);
      if($roles){
        return redirect()->route('roles.index')->with('success', 'Role Created Successfully');
      }else{
        return redirect()->route('roles.index')->with('error', 'Role Created Failed');
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
      return view('admin.pages.role.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
      $request->validate([
        'name' => 'required|unique:roles,name|min:3|max:100'
      ]);
      $roles = DB::table('roles')->where('id', $role->id)->update([
          
          'name' => $request->name
      ]);

      if($roles){
        return redirect()->route('roles.index')->with('success', 'Role Updated Successfully');
      }else{
        return redirect()->route('roles.index')->with('error', 'Role Updated Failed');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
      $roles = DB::table('roles')->where('id', $role->id)->delete();
      if($roles){
        return redirect()->route('roles.index')->with('success', 'Role Deleted Successfully');
      }else{
        return redirect()->route('roles.index')->with('error', 'Role Deleted Failed');
      }
    }
 //custom Method 

    public function search (Request $request){
        $roles = DB::table('roles')
        ->where('name', 'like', '%'.$request->search.'%')
        ->paginate();
        // return view('admin.pages.role.index', ['roles' => $roles]);
        return response()->json($roles);

        // dd("OK");
        // echo $request->search;
    }
}
