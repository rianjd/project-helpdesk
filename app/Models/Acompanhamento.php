<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanhamento extends Model
{
    use HasFactory;
    protected $table = 'followups';
    public $timestamps = false;
    protected $fillable = [
        'items_id',
        'content',
        'users_id',
        'itemtype',
        'date_creation',
        'date_mod',
        'date',
        'status',
    ];
}
