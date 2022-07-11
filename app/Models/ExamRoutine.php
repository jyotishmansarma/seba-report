<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamRoutine extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function soreport(){
        return  $this->hasMany(SoReport::class, 'time_table_id','id');
    }

    public function exam_routine_subject(){
        return  $this->hasMany(ExamRoutineSubject::class, 'exam_routine_id','id');

    }
}
