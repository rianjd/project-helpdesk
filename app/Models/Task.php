<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $fillable = [
        'id',
        'titulo',
        'content',
        'date_creation',
        'date_mod',
        'users_id',
        'user_name',
        'status'
    ];

    public $timestamps = false;
}
