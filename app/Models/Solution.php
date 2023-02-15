<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'solutions';
    public $timestamps = false;
    protected $fillable = [
        'items_id',
        'solutiontype_name',
        'content',
        'users_id',
        'itemtype',
        'date_creation',
        'date_mod',
        'status',
    ];
}
