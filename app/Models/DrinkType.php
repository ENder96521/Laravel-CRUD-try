<?php

namespace App\Models;

use App\Models\Drink;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DrinkType extends Model
{
    use HasFactory;
    protected $table = "drink_types";

    protected $fillable = [
        'name',
    ];

    public function drink() 
    {
        return $this->hasMany(Drink::class, 'type_id');
    }
}
