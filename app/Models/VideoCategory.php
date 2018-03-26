<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TrainingContent;

class VideoCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','description'
    ];

    public function training_contents(){
        return $this->hasMany('App\Models\TrainingContent');
    }
}
