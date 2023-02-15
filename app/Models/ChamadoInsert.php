<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ChamadoInsert extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'date',
        'status',
        'users_id_recipient',
        'content',
        'priority',
        'urgency',
        'impact',
        'itilcategories_id',
        'type',
        'locations_id',
        'date_creation',
        'time_to_resolve',
        'date_mod',
        'users_id_recipient',
        'validation_percent',
        'email',
        'name_req',
        'setor_req',
    ];
}
