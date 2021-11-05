<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'name',
        'price'
    ];

    // public function serviceItem()
    // {
    //     return $this->belongsTo(ServiceItem::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
