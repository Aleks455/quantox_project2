<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'user_id',
        'client_id',
        'grand_total',
        'date',
        'due_date',
    ];
    
    protected $guarded = [];

    protected $with = ['user', 'client'];

    public function scopeFilter($query)
    {
        if (request('search')) {
            $query
            ->where('client_name', 'like', '%' . request('search') . '%')
            ->orWhere ('status', 'like', '$' . request('search') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

