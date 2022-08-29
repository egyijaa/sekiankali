<?php

namespace App\Http\Controllers;

use App\Models\mous;
use App\Models\items;
use Illuminate\Http\Request;
use App\Http\Requests\StoreitemsRequest;
use App\Http\Requests\UpdateitemsRequest;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission: add items|edit items|delete items');
    }
    public function index()
    {
        //
        $items = items::with(['mous'])->get();
        $mous = mous::get();
        return view('pages.items', compact('items','mous'));
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
     * @param  \App\Http\Requests\StoreitemsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'id_mou_opsi' => 'required',
            'sku' => 'required|unique:items,SKU',
            'item' => 'required',
            'harganya' => 'required|numeric|max:10000000|min:500',
            'qty' => 'required|numeric',
        ]);

        $items = new items();
        $items->id_mou = $request->get('id_mou_opsi');
        $items->SKU = $request->get('sku');
        $items->item = $request->get('item');
        $items->harga = $request->get('harganya');
        $items->qty = $request->get('qty');

        $items->save();


        //toast('Data Order Berhasil Disimpan','success');
        return redirect('/items')->with('success','Insert Items successfully');
    }
    public function update(Request $request)
    {
        $items = items::find($request->id);

        $validatedData = $request->validate([
            'id_mou' => 'required',
            'sku' => 'required|unique:items,SKU,'.$items->id,
            'item' => 'required',
            'harga' => 'required|numeric|max:10000000',
            'qty' => 'required|numeric',
        ]);
        
        $items->update($request->all());

        return redirect('/items')->with('success','Items Berhasil Diubah/Update');
    }

    public function delete(Request $request)
    {
        $items = items::find($request->id);
        $items->delete();
        return redirect('/items')->with('success','Items Berhasil Dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(items $items)
    {
        //
    }
}
