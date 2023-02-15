<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueLog extends Model
{
    use HasFactory;
    protected $table = 'estoque_log';
    public $timestamps = false;
    protected $fillable = [
        'item_material','filial', 'setor', 'complemento', 'data', 'quantidade', 'tipo', 'user_mod'
    ];
}
