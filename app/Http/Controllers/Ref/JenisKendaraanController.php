<?php

namespace App\Http\Controllers\Ref;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisKendaraan;
use Yajra\DataTables\DataTables;

class JenisKendaraanController extends Controller
{   
    //role app
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    //view
    public function index()
    {
        $jenis = JenisKendaraan::all();
        return view('jenis_kendaraan.index');
    }

    // validation create
    public function store(Request $req)
    {
        $this->validate($req, [
            'kode_jenis' => 'required',
            'nama_jenis' => 'required',
            'keterangan' => 'required',
        ]);

        //create
        JenisKendaraan::create($req->all());

        return response()->json([
            'succes' => true,
            'message' => 'Jenis Kendaraan Ter Buat'
        ]);
    }

    public function edit($id)
    {
        $jenis = JenisKendaraan::find($id);
        return $jenis;
    }

    //update
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'kode_jenis' => 'required|string|unique:ref_jenis_kendaraan',
            'nama_jenis' => 'required|string',
            'keterangan' => 'required',
        ]);

        $jenis = JenisKendaraan::findOrFail($id);
        $jenis->update($req->all());
        return response()->json([
            'succes' => true,
            'message' => 'Jenis Kendaraan Ter Update'
        ]);
    }

    //delete
    public function destroy($id)
    {
        JenisKendaraan::destroy($id);
        return response()->json([
            'succes' => true,
            'message' => 'Jenis Kendaraan Ter Hapus'
        ]);
    }

    //cek api dan create button
    public function APIJenis()
    {
        $jenis = JenisKendaraan::all();
        return DataTables::of($jenis)->addColumn('action', function($jenis)
        {
            return
            '<a onclick="editForm('. $jenis->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
            '<a onclick="deleteData('. $jenis->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

        }) ->rawColumns(['action'])->make(true);
    }
}
