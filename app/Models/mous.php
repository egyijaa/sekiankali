<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mous extends Model
{
    use HasFactory;

    protected $table = 'mous';
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(items::class, 'id_item', 'id');
    }
}
