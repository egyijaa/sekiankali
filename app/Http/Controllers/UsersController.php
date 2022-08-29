<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\roles;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\permissions;

class UsersController extends Controller
{
    /**
     * Display all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission: add users|edit users|delete users');
    }

    public function index() 
    {
        $users = User::with('roles')->get();
        $roles = roles::get();
        $permissions = permissions::get();

        return view('pages.users', compact('users','roles','permissions'));
    }
    public function getPermissions(Request $request) 
    {
        $user = User::find($request->id);
        $permissions = $user->getAllPermissions();

        return response()->json([
            'message' => 'success',
            'permissions' => $permissions
        ]);
    }

    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request) 
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create(array_merge($request->validated(), [
            'password' => 'test' 
        ]));

        return redirect()->route('pages.users')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) 
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) 
    {
        return view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     * 
     * @param User $user
     * @param UpdateUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request) 
    {   
        $user = User::find($request->id);
        if ($request->role = '0') {
            $user->removeRole();
        }
        elseif($user->getRoleNames() != null || $user->getRoleNames() != '') {
            $user->syncRoles($request->get('role'));
        }
        else {
            $user->assignRole($request->get('role'));
        }

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully. User Telah mendapat Role: '.$request->get('role')));
    }

    public function updateP (Request $request) 
    {   
        $user = User::find($request->id);
        if ($request->role = '0') {
            $user->removeRole();
        }
        elseif($user->getRoleNames() != null || $user->getRoleNames() != '') {
            $user->syncRoles($request->get('role'));
        }
        else {
            $user->assignRole($request->get('role'));
        }

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully. User Telah mendapat Role: '.$request->get('role')));
    }

    /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {   
        $user = User::find($request->id);
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}