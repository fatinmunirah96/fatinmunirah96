<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KodAgensibil extends Model
{
    use HasFactory, SoftDeletes;
    //Nama table
    protected $table = 'kod_agensibil';

    protected $primaryKey = 'id';

    //Semua field yg berkaitan dgn table
    protected $fillable = ['id_agensibil','agensibil'];
}
