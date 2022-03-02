<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishers extends Model
{
	protected $table = 'publishers';
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
}
