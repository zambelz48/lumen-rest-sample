<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        '_id', 'name', 'price', 'image'
    ];

    protected $primaryKey = '_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}