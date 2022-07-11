<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class School extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // public function centrelist()
    // {
    //   return  $this->hasOne(Centerlist::class, 'id','centre_id');
    // }

    // public function scopeCustomSoFilter(Builder $query)
    // {
    //     $query->when(request("district_id"), function (Builder $query) {
    //         return $query->where("dist_id", request("district_id"));
    //     })->when(request("name"), function (Builder $query) {
    //         return $query->where("name","LIKE","%" .request("name"). "%");
    //     })->when(request("designation"), function (Builder $query) {
    //         return $query->where("designation","LIKE","%" . request("designation"). "%");
    //     })->when(request("phone_no"), function (Builder $query) {
    //         return $query->where("phone_no", "LIKE", "%" . request("phone_no") . "%");
    //     })->when(request("school_name"), function (Builder $query) {
    //         return $query->where("centre_id",request("school_name"));
    //     })->when(request("roll_code"), function (Builder $query) {
    //         return $query->where("phone_no", request("roll_code"));
    //     });
    //     return $query;
    // }

}
