<?php

namespace App\Http\Controllers\Ref;

use Illuminate\Http\Request;
use App\Models\StatusKendaraan;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class StatusKendaraanController extends Controller
{
    //role app
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    //view
    public function index()
    {
        $status = StatusKendaraan::all();
        return view('status_kendaraan.index');
    }

    // validation create
    public function store(Request $req)
    {
        $this->validate($req, [
            'nama_sts_kendaraan' => 'required',
        ]);

        //create
        StatusKendaraan::create($req->all());

        return response()->json([
            'succes' => true,
            'message' => 'Status Kendaraan Ter Buat'
        ]);
    }

    public function edit($id)
    {
        $status = StatusKendaraan::find($id);
        return $status;
    }

    //update
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'nama_sts_kendaraan' => 'required',
        ]);

        $status = StatusKendaraan::findOrFail($id);
        $status->update($req->all());
        return response()->json([
            'succes' => true,
            'message' => 'Status Kendaraan Ter Update'
        ]);
    }

    //delete
    public function destroy($id)
    {
        StatusKendaraan::destroy($id);
        return response()->json([
            'succes' => true,
            'message' => 'Status Kendaraan Ter Hapus'
        ]);
    }

    //cek api dan create button
    public function APIStatusKendaraan()
    {
        $status = StatusKendaraan::all();
        return DataTables::of($status)->addColumn('action', function($status)
        {
            return
            '<a onclick="editForm('. $status->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
            '<a onclick="deleteData('. $status->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

        }) ->rawColumns(['action'])->make(true);
    }
}
