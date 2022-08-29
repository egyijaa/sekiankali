<?php

namespace App\Http\Controllers;

use App\Models\permissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission: add permissions|edit permissions|delete permissions');
    }

    public function index()
    {
        //
        $permissions = permissions::get();
        return view('pages.permissions', compact('permissions'));
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
        //
        $validatedData = $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        $role = Permission::create(['name' => $request->get('name')]);
        return redirect()->route('permissions.index')
            ->withSuccess(__('permission added successfully. permission yang bernama: '.$request->get('name').' Berhasil Ditambahkan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function show(Permissions $permissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function edit(Permissions $permissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permissions $permissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) 
    {   
        $user = Permission::where('name','=',$request->get('name'));
        $user->delete();

        return redirect()->route('permissions.index')
            ->withSuccess(__('permissions deleted successfully.'));
    }
    public function destroy(Permissions $permissions)
    {
        //
    }
}
