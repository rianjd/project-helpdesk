<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dash extends Model
{
    use HasFactory;
    protected $table = 'dashborad';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nome',
        'quantidade',
        'tipo',
        'ajuste',
        'data_creation',
        'data_closed',
        'user_closed',
        'user_acomp',
        'filial'
    ];
}
