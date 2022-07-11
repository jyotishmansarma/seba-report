<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamRoutineSubject extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function exam_routine(){
        return  $this->belongsTo(ExamRoutine::class, 'id','exam_routine_id');
    }

}
