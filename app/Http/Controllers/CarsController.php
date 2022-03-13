<?php

namespace App\Http\Controllers;

use App\Models\Product;
Use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Rules\Uppercase;

class CarsController extends Controller
{

    public function index(){

        $cars = Car::all();
        return view('cars.index',[
            'cars' => $cars
        ]);
    }

    //Create
    public function create()
    {
        return view('cars.create');
    }

    //Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => new Uppercase(),
            'founded' => 'required|integer|min:0|max:2021',
            'description' => 'required'
        ]);

        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
        ]);
       return redirect('/cars');
    }

    //show
    public function show($id)
    {
        $car = Car::find($id);
        $products = Product::find($id);

        return view('cars.show')->with('car', $car);
    }

   //edit
    public function edit($id)
    {
        $car = Car::find($id)->first();
        return view('cars.edit')->with('car', $car);
    }

    // Update
    public function update(Request $request, $id)
    {
        $car = Car::where('id', $id)->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
        ]);
        return redirect('/cars');
    }


    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/cars');
    }
}
