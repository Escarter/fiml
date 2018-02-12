<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_payout','month','status','user_id'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
