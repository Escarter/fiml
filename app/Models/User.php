<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPassword;

use App\Models\Role;
use App\Models\Training;
use App\Models\Profit;
use App\Models\Payment;
use App\Models\Billing;

class User extends Authenticatable implements CanResetPassword
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','phone','avatar','sex','location', 'email','username','status', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
      //  $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Relationship between users and billing
     */
    public function billings()
    {
        return $this->hasMany(Billing::class);
    }

    /**
     * 
     */
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * 
     */
    public function profit()
    {
        return $this->hasMany(Profit::class);
    }

    /**
     * Roles relation declaration
     */
    public function roles()
    {
       return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Determine if user have a specific role
     */
    public function hasRole($role)
    {
      if(is_string($role))
      {
         return $this->roles->contains('name',$role);
      }
      return !! $role->intersect($this->roles)->count();
    }

    /**
     * Assign a role to a user
     */
    public function assign($role)
    {
       if (is_string($role)) {
        return $this->roles()->save(
                Role::whereName($role)->firstOrFail()
              );
       }
       $this->roles()->save($role);
    }

    /**
     * Detach all roles from a user
     *
     * @return object
     */
    public function detachAllRoles()
    {
        DB::table('role_user')->where('user_id', $this->id)->delete();

        return $this;
    }
    /**
     * Get role assigned to User
     */
    public function getUserRole() {
      return $this->roles->first()->name;
    }


}
