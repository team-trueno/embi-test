<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellido', 'usuario', 'avatar', 'fecha_nac', 'pais', 'email', 'password', 'activo',
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


    public function jugador()
    {
        return $this->hasOne('App\Jugador', 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function activar($activo = true)
    {
        $this->update(compact('activo'));
    }

    public function hacerAdmin($value = true)
    {
        if ($value) {
            $this->roles()->attach(Role::where('name', 'admin')->first());
        } else {
            $this->roles()->detach(Role::where('name', 'admin')->first());
        }
    }

    public function sacarAdmin()
    {
        hacerAdmin(false);
    }

    public function desactivar()
    {
        $value = $this->activar(false);
        $this->update(compact('activo'));
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasJugador()
    {
        if($this->jugador()->first()) {
            return true;
        }
        return false;
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('superadmin');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile', 'owner_id');
    }
}
