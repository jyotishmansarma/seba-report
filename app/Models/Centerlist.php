<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centerlist extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function scopeCustomFilter(Builder $query)
    {
        $query->when(request("district_id"), function (Builder $query) {
            return $query->where("district_id", request("district_id"));
        })->when(request("center_code"), function (Builder $query) {
            return $query->where("center_code", request("center_code"));
        })->when(request("type"), function (Builder $query) {
            return $query->where("flag", request("type"));
        })->when(request("institution_code"), function (Builder $query) {
            return $query->where("school_code", "LIKE", "%" . request("institution_code") . "%");
        })->when(request("school_name"), function (Builder $query) {
            return $query->where("school_name",request("school_name"));
        })->when(request("phone_number"), function (Builder $query) {
            return $query->where("phone_no", request("phone_number"));
        });
        return $query;
    }
}
