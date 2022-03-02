<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
	protected $table = 'books';
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'isbn',
        'content',
        'description',
        'edition',
    ];

    public function category()
    {
        return $this->hasOne('App\Models\Categories','id');
    }
}
