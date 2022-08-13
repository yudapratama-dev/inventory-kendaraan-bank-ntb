<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'master_kendaraan';
    protected $fillable = ['plat','id_jenis','merk','warna','tanggal_stnk', 'id_status'];
    protected $hidden = ['created_by', 'updated_by', 'created_at', 'updated_at'];

    public function jenis()
    {
        return $this->belongsTo(JenisKendaraan::class);
    }
    public function status()
    {
        return $this->belongsTo(StatusKendaraan::class);
    }

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
