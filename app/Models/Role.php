<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Permission;

class Role extends Model
{
    public function permissions()
    {
       return $this->belongsToMany(Permission::class);
    }
    public function assign(Permission $permission)
    {
       return $this->permissions()->save($permission);
    }
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
