<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JenisKendaraan extends Model
{
    protected $table = 'ref_jenis_kendaraan';
    protected $fillable = ['kode_jenis', 'nama_jenis', 'keterangan'];
    protected $hidden = ['created_by','updated_by','created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = \Auth::user();
            $model->created_by = $user->id;
            $model->updated_by = $user->id;
        });
        static::updating(function ($model) {
            $user = \Auth::user();
            $model->updated_by = $user->id;
        });
    }
}
