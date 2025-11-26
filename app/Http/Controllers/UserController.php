<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        // Get all roles
        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|email|unique:users,email', 'password' => 'required|same:confirm-password', 'roles' => 'required']);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Get user role IDs
        $userRole = $user->roles->pluck('id')->toArray();

        // Get all roles
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|same:confirm-password',
        'roles' => 'required'
    ]);

    $user = User::findOrFail($id);

    // Update basic info
    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    // Sync roles (convert IDs to names)
    $roleNames = \Spatie\Permission\Models\Role::whereIn('id', $request->roles)
                   ->pluck('name')
                   ->toArray();
    $user->syncRoles($roleNames);

    return redirect()->route('users.index')->with('success', 'User updated successfully');
}
 public function destroy($id)
    {
        // Get all roles
$user=user::findOrFail($id);

$user->delete();
    return redirect()->route('users.index')->with('danger', 'User delete successfully');



        
    }

}
