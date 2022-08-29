<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\methods;
use App\Models\invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreinvoicesRequest;
use App\Http\Requests\UpdateinvoicesRequest;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission: add transactions|edit transactions|delete transactions');
    }

    public function index()
    {
        //
        $invoices = DB::select('select a.*, b.SKU, b.item, b.qty as qtys, c.mou, d.method from invoices a inner JOIN items b on b.id = a.id_item inner JOIN mous c on c.id = b.id_mou inner join methods d on d.id = a.id_method order by a.id;');
        $items = items::with('mous')->get();
        $methods = methods::get();
        return view('pages.transactions', compact('invoices', 'items', 'methods'));
    }

    public function getItemsMethods()
    {
        //
        $count = invoices::count();
        $count_length = $this->countDigits($count);
        if ($count_length <= 3) {
            $str_length = 3;
        }
        else {
            $str_length = $count_length+1;
        }
        $str = str_pad($count, $str_length, '0', STR_PAD_LEFT);
        $bulan  = date('n');
        $romawi = $this->getRomawi($bulan);
        $tahun =  date('Y');
        $formatKode = 'INV/'.$romawi.'/'.$tahun.'/'.$str;
        return response()->json([
            'message' => 'success',
            'formatKode' => $formatKode
        ]);
    }

    function countDigits($MyNum){
        $MyNum = (int)$MyNum;
        $count = 0;
      
        while($MyNum != 0){
          $MyNum = (int)($MyNum / 10);
          $count++;
        }
        return $count;
      }

    function getRomawi($bln){

        switch ($bln){

                  case 1:

                      return "I";

                      break;

                  case 2:

                      return "II";

                      break;

                  case 3:

                      return "III";

                      break;

                  case 4:

                      return "IV";

                      break;

                  case 5:

                      return "V";

                      break;

                  case 6:

                      return "VI";

                      break;

                  case 7:

                      return "VII";

                      break;

                  case 8:

                      return "VIII";

                      break;

                  case 9:

                      return "IX";

                      break;

                  case 10:

                      return "X";

                      break;

                  case 11:

                      return "XI";

                      break;

                  case 12:

                      return "XII";

                      break;

            }

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'id_item' => 'required',
            'id_method' => 'required',
            'kode' => 'required|unique:invoices,kode',
            'tgl' => 'required',
            'hargaSebelum' => 'required|numeric|max:100000000|min:500',
            'hargaSesudah' => 'required|numeric|min:500',
            'qty' => 'required|numeric|min:1',
        ]);

        $invoices = new invoices();
        $invoices->id_item = $request->get('id_item');
        $invoices->id_method = $request->get('id_method');
        $invoices->kode = $request->get('kode');
        $invoices->tgl = $request->get('tgl');
        $invoices->hargaSebelum = $request->get('hargaSebelum');
        $invoices->hargaSesudah = $request->get('hargaSesudah');
        $invoices->qty = $request->get('qty');

        $invoices->save();


        //toast('Data Order Berhasil Disimpan','success');
        return response()->json([
            'message' => 'success'
        ]);
    }
    public function update(Request $request)
    {

        invoices::where('id',$request->search)->update(['status'=> 1]);
        return redirect('/transactions')->with('success','invoices Berhasil Diubah/Update');
    }

    public function delete(Request $request)
    {
        $invoices = invoices::find($request->id);
        $invoices->delete();
        return redirect('/transactions')->with('success','invoices Berhasil Dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoices $invoices)
    {
        //
    }
}
