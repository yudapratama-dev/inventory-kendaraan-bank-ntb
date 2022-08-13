<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityKendaraan extends Model
{
    protected $table = 'activity_kendaraan';
    protected $fillable = ['kode_activity', 'id_kendaraan', 'id_divisi', 'id_driver', 'tujuan', 'id_sts_kendaraan', 'id_sts_activity'];
    protected $hidden = ['created_by','updated_by','created_at', 'updated_at'];

    public function Kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function Divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function Driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function StatusActivity()
    {
        return $this->belongsTo(StatusActivity::class);
    }
    
    public function StatusKendaraan()
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
