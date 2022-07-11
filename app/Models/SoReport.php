<?php

namespace App\Models;

use App\Models\Admin\So;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TimeTable;

class SoReport extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function time_table()
    {
        return $this->belongsTo(TimeTable::class,'time_table_id','id');
    }

    public function so()
    {
        return $this->hasOne(So::class,'id','so_id');
    }
    public function centerlist()
    {
        return $this->hasOne(Centerlist::class,'id','centre_id');
    }
    public function exam_routine()
    {
        return $this->hasOne(ExamRoutine::class,'id','time_table_id');
    }

}
