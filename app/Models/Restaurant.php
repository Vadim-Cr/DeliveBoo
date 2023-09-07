<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'image_path',
        'address',
        'vat',
        'mobile_phone'
    ];
    
    public function user () {
        return $this -> hasOne(User::class);
    }

    public function dishes () {       
        return $this -> hasMany(Dish::class);
    }

    public function orders () {       
        return $this -> hasMany(Order::class);
    }

    public function typologies () {       
        return $this -> belongsToMany(Typology::class);
    }
}
