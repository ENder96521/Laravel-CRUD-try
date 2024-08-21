<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use App\Models\DrinkType;

class DrinkController extends Controller
{
    public function create(Request $request) 
    {
        Drink::create([
            'type_id' => $request->type_id,
            'name' => $request->name,
            'cold' => $request->cold,
            'hot' => $request->hot,
        ]);

        return ['message' => 'ok'];
    }

    public function index() 
    {
        $drinkTypes = DrinkType::all();
        return view('welcome', compact('drinkTypes'));
    }

    public function delete(Request $request) 
    {
        $value = Drink::where('name', $request->name)->first();
        $value->delete();      
        return ['message' => 'ok'];
    }

    public function show() 
    {
        $drinkTypes = DrinkType::all();
        $drinks = Drink::with('drinkType')->get();
        return view('list', compact('drinks', 'drinkTypes')); 
    }

    public function change()
    {
        $drinkTypes = DrinkType::all();
        return view('change', compact('drinkTypes'));
    }

    public function updateDrink(Request $request)
    {
        Drink::where('id', $request->id)->update([
            'type_id' => $request->type_id,
            'name' => $request->name,
            'cold' => $request->cold,
            'hot' => $request->hot,
        ]);
        return ['message' => 'ok'];
    }
}
