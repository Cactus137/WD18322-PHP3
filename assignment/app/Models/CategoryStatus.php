<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryStatus extends Model
{
    use HasFactory;

    protected $table = 'category_status';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'status_id', 'id');
    }
}
