<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoPhotoUpload extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function time_table(){
        return $this->hasOne(TimeTable::class,'id','time_table_id');
    }
}
