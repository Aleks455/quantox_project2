<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;

    protected $table = 'service_items';

    protected $fillable = [
        'id',
        'item_id'
        // 'item_name',
        // 'quantity',
        // 'item_price',
        // 'total'
    ];

    // public function invoice()
    // {
    //     return $this->belongsTo(Invoice::class);
    // }

    // public function item()
    // {
    //     return $this->hasMany(Item::class);
    // }
}
