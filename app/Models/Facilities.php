<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helper\Helper;
class Facilities extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $appends = ['fullname', 'image_url','document_url'];
    public function getFullNameAttribute($value)
    {
        return $this->name;
    }
    public function getImageUrlAttribute($value)
    {
        return Helper::image_path($this->image);
    }
    public function getDocumentUrlAttribute($value)
    {
        return Helper::image_path($this->document);
    }
    public function supervisors()
    {
        return $this->hasMany(FacilityContactInfo::class)->select('id','facilities_id','name','email','phone');
    }
}
