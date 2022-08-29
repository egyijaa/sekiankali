<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleHasPermissions extends Model
{
    use HasFactory;

    protected $table = 'role_has_permissions';
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(roles::class, 'role_id', 'id');
    }
    public function permission()
    {
        return $this->belongsTo(permissions::class, 'permission_id', 'id');
    }
}
