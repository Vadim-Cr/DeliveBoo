<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'image_path',
        'description',
        'price',
        'availability',
        'restaurant_id'
    ];

    public function restaurant () {
        return $this -> belongsTo(Restaurant::class);
    }

    public function orders () {       
        return $this -> belongsToMany(Order::class);
    }
}
