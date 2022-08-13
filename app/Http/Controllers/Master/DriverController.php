<?php

namespace App\Http\Controllers\Master;

use App\Models\Driver;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    //role app
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    //view
    public function index()
    {
        $driver = Driver::all();
        return view('driver.index');
    }

    // validation create
    public function store(Request $req)
    {
        $this->validate($req, [
            'nrp'         => 'required|unique:master_driver',
            'nama_driver' => 'required',
            'no_hp'       => 'required',
            'foto'        => 'required',
        ]);

        $input = $req->all();
        $input['foto'] = null;

        if ($req->hasFile('foto')){
            $input['foto'] = '/upload/kendaraan/'.str_slug($input['nrp'], '-').'.'.$req->foto->getClientOriginalExtension();
            $req->foto->move(public_path('/upload/kendaraan/'), $input['foto']);
        }

        //create
        Driver::create($input);

        return response()->json([
            'succes' => true,
            'message' => 'Driver Kendaraan Ter Buat'
        ]);
    }

    public function edit($id)
    {
        $driver = Driver::find($id);
        return $driver;
    }

    //update
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'nrp'         => 'required|unique:master_driver',
            'nama_driver' => 'required',
            'no_hp'       => 'required',
            // 'foto'        => 'required',
        ]);

        $input = $req->all();
        $driver = Driver::findOrFail($id);

        $input['foto'] = $driver->foto;
        if ($req->hasFile('foto')){
            if (!$driver->foto == NULL){
                unlink(public_path($driver->foto));
            }
            $input['foto'] = '/upload/kendaraan/'.str_slug($input['nrp'], '-').'.'.$req->foto->getClientOriginalExtension();
            $req->foto->move(public_path('/upload/kendaraan/'), $input['foto']);
        }

        $driver->update($input);

        return response()->json([
            'succes' => true,
            'message' => 'Driver Ter Update'
        ]);   
    }

    //delete
    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);

        if (!$driver->foto == NULL){
            unlink(public_path($driver->foto));
        }

        Driver::destroy($id);

        return response()->json([
            'succes' => true,
            'message' => 'Driver Ter Hapus'
        ]);

        
    }

    //cek api dan create button
    public function APIDriver()
    {
        $driver = Driver::all();
        return DataTables::of($driver)
        ->addColumn('show_photo', function($driver)
        {
            if ($driver->foto == NULL){
                return 'No Foto';
            }
            return '<img class="rounded-square" width="50" height="50" src="'. url($driver->foto) .'" alt="">';
        })
        ->addColumn('action', function($driver)
        {
            return
            '<a onclick="editForm('. $driver->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
            '<a onclick="deleteData('. $driver->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

        }) 
        ->rawColumns(['show_photo','action'])->make(true);
    }
}
