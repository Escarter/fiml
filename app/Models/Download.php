<?php

namespace App\Models;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name','remote_url','path','description','file_extension'
    ];

    public function likes()
    {
        return $this->morphToMany('App\Models\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }
}
