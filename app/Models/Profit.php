<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Profit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'starting_balance','ending_balance','profit','month'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
