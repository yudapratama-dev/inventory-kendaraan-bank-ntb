<?php

namespace App\Http\Controllers\Ref;

use Illuminate\Http\Request;
use App\Models\StatusActivity;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class StatusActivityController extends Controller
{
    //role app
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    //view
    public function index()
    {
        $status = StatusActivity::all();
        return view('status_activity.index');
    }

    // validation create
    public function store(Request $req)
    {
        $this->validate($req, [
            'nama_sts_activity' => 'required',
        ]);

        //create
        StatusActivity::create($req->all());

        return response()->json([
            'succes' => true,
            'message' => 'Status Activity Ter Buat'
        ]);
    }

    public function edit($id)
    {
        $status = StatusActivity::find($id);
        return $status;
    }

    //update
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'nama_sts_activity' => 'required',
        ]);

        $status = StatusActivity::findOrFail($id);
        $status->update($req->all());
        return response()->json([
            'succes' => true,
            'message' => 'Status Activity Ter Update'
        ]);
    }

    //delete
    public function destroy($id)
    {
        StatusActivity::destroy($id);
        return response()->json([
            'succes' => true,
            'message' => 'Status Activity Ter Hapus'
        ]);
    }

    //cek api dan create button
    public function APIStatusActivity()
    {
        $status = StatusActivity::all();
        return DataTables::of($status)->addColumn('action', function($status)
        {
            return
            '<a onclick="editForm('. $status->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
            '<a onclick="deleteData('. $status->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

        }) ->rawColumns(['action'])->make(true);
    }
}
