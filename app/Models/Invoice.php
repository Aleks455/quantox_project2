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
        'status',
    ];
    
    protected $guarded = [];

    protected $with = ['user', 'client'];

    public function scopeFilter($query)
    {
        if (request('search')) {
            $client_id = auth()->user()->clients()->select('id')->where('name', 'like', '%' . request('search') . '%')->pluck('id')->all();
            $query
            ->where('due_date', 'like', '%' . request('search') . '%')
            ->orWhere('client_id', '=', $client_id );
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

