<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tkt_Sup extends Model
{
    use HasFactory;
    protected $table = 'suppliers_tickets';
    public $timestamps = false;
    protected $fillable = [
        'tickets_id',
        'suppliers_id',
        'type',
        'use_notification',
        'alternative_email',
    ];
}
