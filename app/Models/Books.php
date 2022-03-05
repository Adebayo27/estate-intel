<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'publisher', 'isbn', 'release_date', 'number_of_pages', 'country', 'authors'
    ];

    protected $hidden = ['created_at', 'updated_at', 'id'];

    public function getAuthorsAttribute($value)
    {
        return explode("," ,$value);
    }
}
