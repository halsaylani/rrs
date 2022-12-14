<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'persons_number',
        'is_canceled',
        'is_confirmed',
        'is_done',
    ];

}
