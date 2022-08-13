<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'master_driver';
    protected $fillable = ['nrp','nama_driver','no_hp','foto'];
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
