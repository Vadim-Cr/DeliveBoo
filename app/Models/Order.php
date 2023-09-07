<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time',
        'total_amount',
        'order_status',
        'restaurant_id'
    ];

    public function restaurant () {
        return $this -> belongsTo(Restaurant::class);
    }

    public function customer () {
        return $this -> belongsTo(Customer::class, 'order_id', 'id');
    }

    public function dishes () {       
        return $this -> belongsToMany(Dish::class);
    }

}
