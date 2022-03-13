@extends('layouts.app')

@section('content')

    <div class="m-auto py-24 w-4/8">
        <div class="text-center">
            <h1 class="text-5xl bold uppercase">Update Car</h1>
        </div>
    </div>

    <div class="flex justify-items-center pt-20">
        <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="block">
                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400 "
                       name="name" placeholder="Brand name.." value="{{$car->name}}">

                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400 "
                       name="founded" placeholder="Founded.." value="{{$car->founded}}">
                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400 "
                       name="description" placeholder="description.." value="{{$car->description}}">

                <button class="bg-green-600 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">Submit</button>
            </div>
        </form>
    </div>



@endsection
