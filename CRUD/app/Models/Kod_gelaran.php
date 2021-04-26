<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kod_gelaran extends Model
{
    use HasFactory, SoftDeletes;
    //Nama table
    protected $table = 'kod_gelaran';

    protected $primaryKey = 'id';

    //Semua field yg berkaitan dgn table
    protected $fillable = ['id_gelaran','gelaran'];
}
