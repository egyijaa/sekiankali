<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\District;
use App\Models\permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission: add roles|edit roles|delete roles');
    }

    public function index()
    {
        //
        $roles = DB::select('select roles.name AS name, GROUP_CONCAT(permissions.name SEPARATOR ", ") AS permissions from roles left JOIN role_has_permissions on role_has_permissions.role_id = roles.id left JOIN permissions on permissions.id = role_has_permissions.permission_id GROUP BY roles.name;');
        $permissions = permissions::get();
        return view('pages.roles', compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $role = Role::create(['name' => $request->get('name')]);
            for($i = 0; $i < count($request->permissions); $i++){
                $role->givePermissionTo($request->get('permissions')[$i]);
            } 
        return redirect()->route('roles.index')
            ->withSuccess(__('Role added successfully. Role yang bernama: '.$request->get('name').' Berhasil Ditambahkan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $role = Role::where('name','=',$request->get('name'));
        var_dump($role); die();
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name,'.$role->name
        ]);
        $role->update($request->all());
            for($i = 0; $i < count($request->permissions); $i++){
                $role->givePermissionTo($request->get('permissions')[$i]);
            } 
        return redirect()->route('roles.index')
            ->withSuccess(__('Role added successfully. Role yang bernama: '.$request->get('name').' Berhasil Ditambahkan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) 
    {   
        $user = roles::where('name','=',$request->get('name'));
        $user->delete();

        return redirect()->route('roles.index')
            ->withSuccess(__('Role deleted successfully.'));
    }
}