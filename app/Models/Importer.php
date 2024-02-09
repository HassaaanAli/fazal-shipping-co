<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importer extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'company_name',
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = !empty($query->uuid) ? $query->uuid : getUuid();
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
