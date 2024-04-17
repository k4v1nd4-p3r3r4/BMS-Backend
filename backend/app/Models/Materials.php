<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;

    protected $table ='materials';
    protected $primaryKey = 'material_id';

    protected $fillable = [
       'material_id',
        'material_name',
        'initial_qty',
         'unit',
         
    ];
    protected $keyType = 'string'; //it use to difine primary key as a string
}
