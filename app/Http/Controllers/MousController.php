<?php

namespace App\Http\Controllers;

use App\Models\mous;
use Illuminate\Http\Request;
use App\Http\Requests\StoremousRequest;
use App\Http\Requests\UpdatemousRequest;

class MousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission: add mous|edit mous|delete mous');
    }


    public function index()
    {
        //
        $mous = mous::get();
        return view('pages.mous', compact('mous'));
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
     * @param  \App\Http\Requests\StoremousRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'mou' => 'required|unique:mous,mou',
        ]);

        $mous = new mous();
        $mous->mou = $request->get('mou');

        $mous->save();


        //toast('Data Order Berhasil Disimpan','success');
        return redirect('/mous')->with('success','Insert UoMs successfully');
    }
    public function update(Request $request)
    {
        $mous = mous::find($request->id);

        $validatedData = $request->validate([
            'mou' => 'required|unique:mous,mou,'.$mous->id,
        ]);
        
        $mous->update($request->all());

        return redirect('/mous')->with('success','UoMs Berhasil Diubah/Update');
    }

    public function delete(Request $request)
    {
        $mous = mous::find($request->id);
        $mous->delete();
        return redirect('/mous')->with('success','UoMs Berhasil Dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mous  $mous
     * @return \Illuminate\Http\Response
     */
    public function show(mous $mous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mous  $mous
     * @return \Illuminate\Http\Response
     */
    public function edit(mous $mous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemousRequest  $request
     * @param  \App\Models\mous  $mous
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mous  $mous
     * @return \Illuminate\Http\Response
     */
    public function destroy(mous $mous)
    {
        //
    }
}
