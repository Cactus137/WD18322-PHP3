<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ads';

    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'description',
        'link',
        'status_id',
        'clicks',
        'start_date',
        'end_date',
    ]; 

    public function status()
    {
        return $this->belongsTo(AdsStatus::class);
    }
}
