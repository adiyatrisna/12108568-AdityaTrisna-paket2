<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sale';
    protected $fillable = ([
        "TglSale",
        "TtlPrice",
        "cust_id"
    ]);

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cust_id', 'id');
    }

    public function saleDetails()
    {
        return $this->hasMany(DetailSale::class, 'sale_id', 'id');
    }
}
