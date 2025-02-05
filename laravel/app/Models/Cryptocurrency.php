<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    protected $table = 'cryptocurrencies';
    protected $primaryKey = 'crypto_id';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'symbol',
        'current_price',
        'created_date',
        'updated_date',
    ];

    public $timestamps = false; 
}
