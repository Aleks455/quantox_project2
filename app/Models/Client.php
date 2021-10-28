<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory; 

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'user_id',
        'company_number',
        'vat_id',
        'bank_account',
        'phone_number',
        'email',
        'address',
        'city',
        'postal_code',
        'country'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
