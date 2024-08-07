<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [ 
        'name',
        'slug',
        'description',
        'imageUrl',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
