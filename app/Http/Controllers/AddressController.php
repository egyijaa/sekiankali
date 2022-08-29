<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\address;
use App\Helper\ApiFormatter;
use App\Http\Requests\StoreaddressRequest;
use App\Http\Requests\UpdateaddressRequest;
use GuzzleHttp\Psr7\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = address::all();
        if ($data) {
            return ApiFormatter::createApi(200,'Success',$data);
        }
        else{
            return ApiFormatter::createApi(400,'Terdapat Kesalahan');
        }
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
     * @param  \App\Http\Requests\StoreaddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {

            $request->validate([
                'address' => 'required',
                'district' => 'required',
                'city' => 'required',
                'province' => 'required',
                'postal_code' => 'required',
            ]);

            $addresses = address::create([
                'address' => $request->address,
                'district' => $request->district,
                'city' => $request->city,
                'province' => $request->province,
                'postal_code' => $request->postal_code,
            ]);

            $data = address::where('id','=',$addresses->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Beerhasil Menambahkan Data', $data);
            }
            else{
                return ApiFormatter::createApi(400, 'Terdapat Kesalahan');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //code...
            $data = address::where('id','=',$id)->get();

            if ($data) {
                return ApiFormatter::createApi(200,'Success',$data);
            }
            else{
                return ApiFormatter::createApi(400,'Failed');
            }
        } catch (Exception $error) {
            //throw $th;
            return ApiFormatter::createApi(400, $error->getMessage());
        }
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaddressRequest  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  
        try {
            $address = address::findOrFail($id);

            $address->delete();

            if ($address) {
                return ApiFormatter::createApi(200,'Berhasil Menghapus Data');
            }
            else{
                return ApiFormatter::createApi(400,'Terdapat kesalahan');
            };
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, $error->getMessage());
        }
    }
}
