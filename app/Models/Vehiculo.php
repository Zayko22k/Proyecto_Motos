<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = "vehiculo";
    protected $primaryKey = "idvehiculo";
    protected $fillable = [
        'modelo',
        'motor',
        'anio',
        'imagen',
        'created_at',
        'modelo_idmodelo',
        'marca_idmarca'
    ];
    public $timestamps = false;
    use HasFactory;
}
