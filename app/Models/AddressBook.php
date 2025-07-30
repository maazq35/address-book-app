<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    use HasFactory;

    protected $fillable = [
    'title', 'contact_name', 'contact_number',
    'address_line1', 'address_line2', 'address_line3',
    'pincode', 'city', 'state', 'country',
    'is_default_from', 'is_default_to', 'user_id'
];

public function user()
{
    return $this->belongsTo(User::class);
}

}
