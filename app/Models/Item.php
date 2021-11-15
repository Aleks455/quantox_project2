<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'name',
        'price',
        'quantity',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoices()
    {
        return $this->belongsTo(Invoice::class);
    }

}
