<?php

namespace App;

use App\Notifications\EmployeeResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $table = 'employees';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'first_name', 'middle_name',
        'last_name', 'primary_phone',
        'secondary_phone',
        'email',
        'contact_image',
        'role',
        'reporting_manager',
        'date_of_hoining',
        'password'
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
      protected $dates = [
        'date_of_joining',
    ];
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployeeResetPassword($token));
    }
    public function role() {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    
   
}
