<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $guarded = [];

    public function mous()
    {
        return $this->belongsTo(mous::class, 'id_mou', 'id');
    }

    public function items()
    {
        return $this->belongsTo(items::class, 'id_item', 'id');
    }
}
