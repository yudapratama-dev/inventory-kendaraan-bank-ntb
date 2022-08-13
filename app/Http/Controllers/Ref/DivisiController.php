<?php

namespace App\Http\Controllers\Ref;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DivisiController extends Controller
{
    //role app
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    //view
    public function index()
    {
        $divisi = Divisi::all();
        return view('divisi.index');
    }

    // validation create
    public function store(Request $req)
    {
        $this->validate($req, [
            'kode_divisi' => 'required',
            'nama_divisi' => 'required',
            'keterangan' => 'required',
        ]);

        //create
        Divisi::create($req->all());

        return response()->json([
            'succes' => true,
            'message' => 'divisi Kendaraan Ter Buat'
        ]);
    }

    public function edit($id)
    {
        $divisi = Divisi::find($id);
        return $divisi;
    }

    //update
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'kode_divisi' => 'required',
            'nama_divisi' => 'required',
            'keterangan' => 'required',
        ]);

        $divisi = Divisi::findOrFail($id);
        $divisi->update($req->all());
        return response()->json([
            'succes' => true,
            'message' => 'Divisi Ter Update'
        ]);
    }

    //delete
    public function destroy($id)
    {
        Divisi::destroy($id);
        return response()->json([
            'succes' => true,
            'message' => 'Divisi Ter Hapus'
        ]);
    }

    //cek api dan create button
    public function APIDivisi()
    {
        $divisi = Divisi::all();
        return DataTables::of($divisi)->addColumn('action', function($divisi)
        {
            return
            '<a onclick="editForm('. $divisi->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
            '<a onclick="deleteData('. $divisi->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

        }) ->rawColumns(['action'])->make(true);
    }
}
