<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailUpdatedMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id == 5){
            abort(403);
        }
        // exit();
        // $users = User:: all();
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::orderBy('id', 'desc')
        // ->whereIN ('role_id',[2,3])
        // ->get();
         
        // $users = User::orderBy('id', 'desc')
        // ->select('id', 'name', 'email', 'role_id')
        // ->first();

        $users = User::join('roles as r', 'users.role_id', '=', 'r.id')
       ->orderBy('id', 'desc')
        ->select('users.id', 'users.name', 'users.email', 'r.name as role')
        ->paginate(10);
        // ->get();


        // dd($users);
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role_id == 5){
            abort(403);
            exit();
        }
        $roles = Role::from('roles as r')->orderBy('name', 'asc')->get(); 
        return view('admin.pages.user.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    if(Auth::user()->role_id == 5){
            abort(403);
        }
        exit();
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required',
            'password' => 'required|min:3|max:15',
            'password_confirmation' => 'required|same:password',
        ]);

//        $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'role_id' => $request->role_id,
//             'password' =>Hash::make($request->password),
       
            
//         ]);

// if($user){
    

//         return redirect()->route('users.index')->with('success', 'User created successfully');

//     } else {
//         return redirect()
//         ->route('users.create')
//         ->with('error', 'User not created');
//     };
//     }


$user = new User();
$user->name = $request->name;
$user->email = $request->email;
$user->role_id = $request->role_id;
$user->password = Hash::make($request->password);
// $user->save();

if ($user->save()) {
    return redirect()->route('users.index')->with('success', 'User created successfully');
} else {
    return redirect()->route('users.create')->with('error', 'User not created');
}
    }
    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     return view('admin.pages.user.show',);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        if(Auth::user()->role_id == 5 && Auth::user()->id != $id){
            abort(403);
            exit;
        }
        $roles = Role::all();
        $user = User::find($id);
        // dd($user);
        return view('admin.pages.user.edit', compact('roles' , 'user'));
    }

    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, string $id)
{
    if(Auth::user()->role_id == 5 && Auth::user()->id != $id){
        abort(403);
    }

    $request->validate([
        'name' => 'required|min:3|max:100',
        'email' => "required|email|unique:users,email,$id",
        'role_id' => 'required',
    ]);

    $user = User::find($id);

    $oldEmail = $user->email;

   
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role_id = $request->role_id;

    if($user->save()) {


        if($oldEmail != $user->email) {

            // Old email-এ notification
            Mail::to($oldEmail)
                ->send(
                    new EmailUpdatedMail(
                        $user->name,
                        // $oldEmail,
                        // $user->email
                    )
                );

            // New email-এ notification
            Mail::to($user->email)
                ->send(
                    new EmailUpdatedMail(
                        $user->name,
                        // $oldEmail,
                        // $user->email
                    )
                );
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully');

    } else {

        return redirect()
            ->route('users.edit', ['id' => $id])
            ->with('error', 'User not updated');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Auth::user()->role_id == 5 && Auth::user()->id != $id){
            abort(403);
        }
        $user = User::join('roles as r', 'users.role_id', '=', 'r.id')
        ->select('users.id', 'users.name', 'users.email', 'r.name as role')
        ->where('users.id', $id)
        ->first();
        // dd($user);
        return view('admin.pages.user.show', ['user' => $user]);




    }

    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


    if(Auth::user()->role_id != 3 && Auth::user()->role_id != 2){
        abort(403);
    }else{
   // dd($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
        
    }
}
