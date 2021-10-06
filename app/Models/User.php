<?php

namespace App\Models;

use App\Orders;
use App\Permission;
use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'is_active', 'role_id', 'phone'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function canAccessAdminPanel()
    {
        return $this->role->name == 1
            || $this->role_id == 3
            || $this->role_id == 4;
    }
    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
    public function getImageAttribute()
    {
        return $this->profile_image;
    }

    public function hasPermission($name)
    {
        $this->loadPermissionsRelations();

        $_permissions = $this->role()
            ->pluck('permissions')->flatten()
            ->pluck('key')->unique()->toArray();

        return in_array($name, $_permissions);
    }
    private function loadRolesRelations()
    {
        if (!$this->relationLoaded('role')) {
            $this->load('role');
        }

        if (!$this->relationLoaded('roles')) {
            $this->load('roles');
        }
    }

    private function loadPermissionsRelations()
    {
        $this->loadRolesRelations();

        if ($this->role && !$this->role->relationLoaded('permissions')) {
            $this->role->load('permissions');
            $this->load('roles.permissions');
        }
    }

}
