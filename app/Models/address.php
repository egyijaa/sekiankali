<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $guarded = [];

    public function address()
    {
        return $this->belongsTo(customers::class, 'customer_id', 'id');
    }
}
