<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Negeri extends Model
{
    use HasFactory, SoftDeletes;

    //Nama table
    protected $table = 'negeri';


    protected $primaryKey = 'id';


    protected $fillable = ['negeri'];
}
