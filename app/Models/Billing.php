<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Billing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','status','start_date','end_date'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
