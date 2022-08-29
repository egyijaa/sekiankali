<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invoices = DB::select('select a.*, b.SKU, b.item, b.qty as qtys, c.mou, d.method from invoices a inner JOIN items b on b.id = a.id_item inner JOIN mous c on c.id = b.id_mou inner join methods d on d.id = a.id_method order by a.id;');
        return view('pages.dashboard', compact('invoices'));
    }
}
