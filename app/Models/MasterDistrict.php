<?php

namespace App\Models;

use App\Models\Admin\So;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDistrict extends Model
{
    use HasFactory;
    protected $table = 'master_district';
    protected $guarded = [
        'id',
    ];

    public function district()
    {
        return $this->belongsTo(So::class,'dist_id','dist_id');
    }
}
