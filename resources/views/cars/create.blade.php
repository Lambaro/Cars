@extends('layouts.app')

@section('content')

<div class="m-auto py-24 w-4/8">
    <div class="text-center">
        <h1 class="text-5xl bold uppercase">Create Car</h1>
    </div>
</div>
    <div class="pt-20 flex justify-center" >
        <form action="/cars" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="block">
                <input type="file"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400 bg-gradient-to-r from-amber-300 to-amber-600"
                       name="image">

                <input type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400 bg-gradient-to-r from-amber-300 to-amber-600"
                name="name" placeholder="Brand name..">

                <input type="text"
                       class="block  shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400  bg-gradient-to-r from-amber-300 to-amber-600 "
                       name="founded" placeholder="Founded..">
                <input type="text"
                       class="block  shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400   bg-gradient-to-r from-amber-300 to-amber-600"
                       name="description" placeholder="description..">

                <button class="block bg-green-600  shadow-5xl mb-10 p-2 w-80 uppercase font-bold">Submit</button>
            </div>
        </form>

    </div>

        @if($errors->any())
            <div class="w-3/6 m-auto text-center">
                @foreach($errors->all() as $error)
                    <li class="text-red-500 list-none">
                        {{ $error }}
                    </li>
                @endforeach
            </div>
        @endif
@endsection
