<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $guarded = [];

    public function mous()
    {
        return $this->belongsTo(mous::class, 'id_mou', 'id');
    }

    public function items()
    {
        return $this->hasMany(invoices::class, 'id_item', 'id');
    }
}
