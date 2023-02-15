<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tkt_Users extends Model
{
    use HasFactory;
    protected $table = 'tickets_users';
    public $timestamps = false;
    protected $fillable = [
        'tickets_id',
        'users_id',
        'type',
        'use_notification',
        'alternative_email',
    ];
}
