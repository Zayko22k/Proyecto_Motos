<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = "marca";
    protected $primaryKey = "idmarca";
    protected $fillable = [
        'nombre',
        'created_at',
        'updated_at'
    ]; 
    public $timestamps = false;
    use HasFactory;
}
