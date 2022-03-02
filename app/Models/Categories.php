<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $table = 'categories';
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function books()
    {
        return $this->belongsTo('App\Models\Books', 'id');
    }
}
