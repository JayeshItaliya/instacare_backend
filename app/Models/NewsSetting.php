<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsSetting extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function added_by(){
        return $this->belongsTo(User::class,'added_by')->select(['id','fname']);
    }
}
