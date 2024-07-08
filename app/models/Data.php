<?php

namespace App\Models;

class Data extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'payload',
    ];
}
