<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SoReport;

class TimeTable extends Model
{
    use HasFactory;
    protected $table = 'time_table';
    protected $guarded = [
        'id',
    ];
    public function soreport(){
        return  $this->hasMany(SoReport::class, 'time_table_id','id');
    }




}
