<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class roles extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'roles';
    protected $guarded = [];

    public function role_has_permissions()
    {
        return $this->hasMany(roleHasPermissions::class, 'role_id', 'id');
    }
}
