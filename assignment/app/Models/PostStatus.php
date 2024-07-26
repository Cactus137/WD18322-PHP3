<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostStatus extends Model
{
    use HasFactory;

    protected $table = 'post_status';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function post() {
        return $this->belongsTo(Post::class, 'status_id', 'id');
    }
}
