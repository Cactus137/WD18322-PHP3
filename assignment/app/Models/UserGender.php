<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGender extends Model
{
    use HasFactory;

    protected $table = 'user_gender';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'gender_id', 'id');
    }
}
