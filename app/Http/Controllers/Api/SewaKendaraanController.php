<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\SewaKendaraan;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SewaKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewa = SewaKendaraan::all();
        if (count($sewa) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $sewa
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewa = SewaKendaraan::all();

        if (count($sewa) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $sewa
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'lokasi' => 'required',
            'tanggalPinjam' => 'required',
            'tanggalKembali' => 'required',
            'modelKendaraan' => 'required',
        ]);
        // $storeData = new Product();
        if ($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $sewa = SewaKendaraan::create($storeData);
        return response([
            'message' => 'Tambah Sewa Berhasil',
            'data' => $sewa
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewa = SewaKendaraan::find($id);

        if (!is_null($sewa)) {
            return response([
                'message' => 'Berhasil Mendapatkan Data Sewa',
                'data' => $sewa
            ], 200);
        }

        return response([
            'message' => 'Data Sewa Tidak Ditemukan',
            'data' => null
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sewa = SewaKendaraan::find($id);
        if (is_null($sewa)) {
            return response([
                'message' => 'Data Sewa Tidak Ditemukan',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'lokasi' => 'required',
            'tanggalPinjam' => 'required',
            'tanggalKembali' => 'required',
            'modelKendaraan' => 'required',
        ]);

        if ($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $sewa->lokasi = $updateData['lokasi'];
        $sewa->tanggalPinjam = $updateData['tanggalPinjam'];
        $sewa->tanggalKembali = $updateData['tanggalKembali'];
        $sewa->modelKendaraan = $updateData['modelKendaraan'];

        if ($sewa->save()) {
            return response([
                'message' => 'Data Sewa Berhasil diUpdate',
                'data' => $sewa
            ], 200);
        }

        return response([
            'message' => 'Data Sewa Gagal diUpdate',
            'data' => null
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sewa = SewaKendaraan::find($id);

        if (is_null($sewa)) {
            return response([
                'message' => 'Data Sewa Tidak Ditemukan',
                'data' => null
            ], 404);
        }

        if ($sewa->delete()) {
            return response([
                'message' => 'Hapus Data Sewa Berhasil',
                'data' => $sewa
            ], 200);
        }

        return response([
            'message' => 'Hapus Data Sewa Tidak Berhasil',
            'data' => null
        ], 400);
    }
}
