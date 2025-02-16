<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thuctap extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'thuctap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'avatar','birthday','biography',
    ];
}
