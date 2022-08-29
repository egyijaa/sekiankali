<?php

namespace App\Http\Controllers;

use App\Models\methods;
use Illuminate\Http\Request;
use App\Http\Requests\StoremethodsRequest;
use App\Http\Requests\UpdatemethodsRequest;

class MethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission: add methods|edit methods|delete methods');
    }

    public function index()
    {
        //
        $methods = methods::get();
        return view('pages.methods', compact('methods'));
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
     * @param  \App\Http\Requests\StoremethodsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'method' => 'required|unique:methods,method',
        ]);

        $methods = new methods();
        $methods->method = $request->get('method');

        $methods->save();


        //toast('Data Order Berhasil Disimpan','success');
        return redirect('/methods')->with('success','Insert Jenis Pembayaran successfully');
    }
    public function update(Request $request)
    {
        $methods = methods::find($request->id);

        $validatedData = $request->validate([
            'method' => 'required|unique:methods,method,'.$methods->id,
        ]);
        
        $methods->update($request->all());

        return redirect('/methods')->with('success','Jenis Pembayaran Berhasil Diubah/Update');
    }

    public function delete(Request $request)
    {
        $methods = methods::find($request->id);
        $methods->delete();
        return redirect('/methods')->with('success','Jenis Pembayaran Berhasil Dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\methods  $methods
     * @return \Illuminate\Http\Response
     */
    public function show(methods $methods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\methods  $methods
     * @return \Illuminate\Http\Response
     */
    public function edit(methods $methods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemethodsRequest  $request
     * @param  \App\Models\methods  $methods
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\methods  $methods
     * @return \Illuminate\Http\Response
     */
    public function destroy(methods $methods)
    {
        //
    }
}
