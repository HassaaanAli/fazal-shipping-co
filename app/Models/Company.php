<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = !empty($query->uuid) ? $query->uuid : getUuid();
        });
    }

    public function importer()
    {
        return $this->hasMany(Importer::class, 'company_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
