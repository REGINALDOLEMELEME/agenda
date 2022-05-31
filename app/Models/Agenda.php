<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

protected $date = ['data_evento'];


protected $fillable = [
    'data_evento',
    'periodo',
    'user_id',
];

}


