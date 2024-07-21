<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsStatus extends Model
{
    use HasFactory;

    protected $table = 'ads_status';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function ads()
    {
        return $this->hasMany(Ads::class, 'status_id', 'id');
    }
}
