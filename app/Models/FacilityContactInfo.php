<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilityContactInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function facility()
    {
        return $this->belongsTo(Facilities::class,'facilities_id');
    }
}
