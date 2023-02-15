<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table = 'estoques';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'item_material',
        'quantidade',
        'ultima_att',
    ];
}
