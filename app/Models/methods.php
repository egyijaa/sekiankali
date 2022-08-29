<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class methods extends Model
{
    use HasFactory;

    protected $table = 'methods';
    protected $guarded = [];

    public function invoices()
    {
        return $this->hasMany(invoices::class, 'id_method', 'id');
    }
}
