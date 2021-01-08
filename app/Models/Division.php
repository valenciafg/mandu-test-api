<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = "divisions";
    protected $fillable = ['name', 'level', 'employees', 'ambassador', 'superior_division_id'];

    //  Relacion 1 a 1
    public function superior_division() {
        return $this->belongsTo('\App\Models\Division', 'superior_division_id');
    }
    //  Sub-divisiones - Relación muchos a muchos
    public function subdivisions() {
        return $this->belongsToMany('\App\Models\Division', 'subdivisions', 'division_id', 'child_id');
    }
}
