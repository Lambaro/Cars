<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Promise\Create;
Use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class CarsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
        // methods we can use on request
        //guessExtension() ; store() ; asStore() ; storePublicly();
        // move(); getClientOriginalName(); getClientMimeType(); getSize();
        // getError(); isValid();

        $request->validate([
            'name'=> 'required',
            'founded'=> 'required|integer|min:0|max:2021',
            'description' => 'required',
            'image'=> 'required|mimes:jpeg,jpg,png|max:5048',
        ]);
        $newImageName = time(). '-' . $request->name . '.' .
            $request->image->extension();

            $request->image->move(public_path('images'), $newImageName );


        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
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
    public function update(CreateValidationRequest $request, $id)
    {
        $request->validated();

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
