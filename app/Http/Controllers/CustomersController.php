<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\address;
use App\Models\customers;
use App\Helper\ApiFormatter;
use Illuminate\Http\Request;
use App\Http\Requests\StorecustomersRequest;
use App\Http\Requests\UpdatecustomersRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = customers::select('title','name')->orderBy('name')->get();
        if ($data) {
            return ApiFormatter::createApi(200,'Success',$data);
        }
        else{
            return ApiFormatter::createApi(400,'Failed');
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
     * @param  \App\Http\Requests\StorecustomersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $pesan = '';
            $validator = $request->validate([
                'title' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'phone_number' => 'required|unique:customers,phone_number',
                'email' => 'required|unique:customers,email',
            ]);

            if (isset($request->address) || isset($request->district) || isset($request->city) || isset($request->province) || isset($request->postal_code)) {
                
                $request->validate([
                    'address' => 'required',
                    'district' => 'required',
                    'city' => 'required',
                    'province' => 'required',
                    'postal_code' => 'required',
                ]);
                $customers = customers::create([
                    'title' => $request->title,
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'phone_number' => $request->phone_number,
                    'image' => $request->image,
                    'email' => $request->email,
                ]);
                $addresses = address::create([
                    'customer_id' => $customers->id,
                    'address' => $request->address,
                    'district' => $request->district,
                    'city' => $request->city,
                    'province' => $request->province,
                    'postal_code' => $request->postal_code,
                ]);
                $pesan = "Berhasil Menambah Customer dan Address";
            }
            else {
                $customers = customers::create([
                    'title' => $request->title,
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'phone_number' => $request->phone_number,
                    'image' => $request->image,
                    'email' => $request->email,
                ]);
                $pesan = "Berhasil Menambah Customer";
            }

            $data = customers::with('address')->where('id','=',$customers->id)->get();
            if ($data) {
                return ApiFormatter::createApi(200, $pesan, $data);
            }
            else{
                return ApiFormatter::createApi(400, 'Terdapat Kesalahan');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, $error->getMessage());
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            try {
                $data = customers::with('address')->where('id','=',$id)->get();

                if ($data) {
                    return ApiFormatter::createApi(200,'Success',$data);
                }
                else{
                    return ApiFormatter::createApi(400, 'Failed');
                }
            } catch (Exception $error) {
                return ApiFormatter::createApi(400, $error->getMessage());
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecustomersRequest  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $customers = customers::find($id)->update([
                'name' => $request->has('name')
            ]);

            $data = customers::where('id','=',$id)->get();
            if ($data) {
                return ApiFormatter::createApi(200,'Success',$data);
            }
            else{
                return ApiFormatter::createApi(400,'Failed');
            }

        } catch (Exception $error) {

            return ApiFormatter::createApi(400,'Failed');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  
        try {
            $customers = customers::findOrFail($id);

            $customers->delete();

            $data = customers::select('title','name')->orderBy('name')->get();

            if ($data) {
                return ApiFormatter::createApi(200,'Berhasil Menghapus Data', $data);
            }
            else{
                return ApiFormatter::createApi(400,'Failed');
            };
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Data yang kamu ingin hapus tidak ada atau sudah terhapus');
        }
    }
}
