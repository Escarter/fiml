<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $table = 'likeables';

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];

    /**
     * Get all of the content that are assigned this like.
     */
    public function training_contents()
    {
        return $this->morphedByMany('App\Models\TrainingContent', 'likeable');
    }
    /**
     * Get all of the content that are assigned this like.
     */
    public function download_contents()
    {
        return $this->morphedByMany('App\Models\Download', 'likeable');
    }
}
