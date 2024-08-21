<?php

namespace App\Models;

use App\Models\DrinkType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Drink extends Model
{
    use HasFactory;
    protected $table = 'drinks';
    protected $fillable = [
        'type_id',
        'name',
        'cold',
        'hot',
    ];

    public function drinkType() 
    {
        return $this->belongsTo(DrinkType::class, 'type_id');
    }
}
