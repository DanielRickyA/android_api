<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SewaMotor;

class SewaMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewaMotor = SewaMotor::all();
        if (count($sewaMotor) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $sewaMotor
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
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'lokasi' => 'required',
            'tanggalPinjam' => 'required',
            'tanggalKembali' => 'required',
            'merkMotor' => 'required',
            'jenisMotor' => 'required',
        ]);
        // $storeData = new Product();
        if ($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $sewaMotor = SewaMotor::create($storeData);
        return response([
            'message' => 'Tambah Sewa Motor Berhasil',
            'data' => $sewaMotor
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
        $sewaMotor = SewaMotor::find($id);

        if (!is_null($sewaMotor)) {
            return response([
                'message' => 'Berhasil Mendapatkan Data Sewa',
                'data' => $sewaMotor
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
        $sewaMotor = SewaMotor::find($id);
        if (is_null($sewaMotor)) {
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
            'merkMotor' => 'required',
            'jenisMotor' => 'required',
        ]);

        if ($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $sewaMotor->lokasi = $updateData['lokasi'];
        $sewaMotor->tanggalPinjam = $updateData['tanggalPinjam'];
        $sewaMotor->tanggalKembali = $updateData['tanggalKembali'];
        $sewaMotor->merkMotor = $updateData['merkMotor'];
        $sewaMotor->jenisMotor = $updateData['jenisMotor'];


        if ($sewaMotor->save()) {
            return response([
                'message' => 'Data Sewa Motor Berhasil diUpdate',
                'data' => $sewaMotor
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
        $sewaMotor = SewaMotor::find($id);

        if (is_null($sewaMotor)) {
            return response([
                'message' => 'Data Sewa Tidak Ditemukan',
                'data' => null
            ], 404);
        }

        if ($sewaMotor->delete()) {
            return response([
                'message' => 'Hapus Data Sewa Berhasil',
                'data' => $sewaMotor
            ], 200);
        }

        return response([
            'message' => 'Hapus Data Sewa Tidak Berhasil',
            'data' => null
        ], 400);
    }
}
