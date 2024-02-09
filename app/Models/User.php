<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public const STATUS_PENDING = 'pending';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_SUSPENDED = 'suspended';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // auto-sets values on creation
        static::creating(function ($query) {
            $query->uuid = !empty($query->uuid) ? $query->uuid : getUuid();
        });
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }

    public function getStatusBadge()
    {
        if ($this->status == self::STATUS_PENDING) {
            return '<span class="badge badge-warning">Pending</span>';
        }

        if ($this->status == self::STATUS_ACTIVE) {
            return '<span class="badge badge-success">Active</span>';
        }

        if ($this->status == self::STATUS_SUSPENDED) {
            return '<span class="badge badge-danger">Suspended</span>';
        }

        return '<span class="badge">Unknown</span>';
    }

    function getRolesBadges()
    {
        $roles = $this->roles()->pluck('name');

        if (empty($roles)) return canEmpty(null);

        $html = '';

        foreach ($this->roles()->pluck('name') as $role) {
            $html .= '<span class="badge mr-2">' . replaceUnderscores($role) . '</span>';
        }

        return $html;
    }

    public function getUserFriendlyRoleName()
    {
        $roleName = $this->roles()->first()?->name;

        return empty($roleName)
            ? 'Unknown'
            : replaceUnderscores($roleName);
    }
}
