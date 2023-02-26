@extends('layouts.master')
@section('title', 'Cart')

@section('content')
        @if (count($cart) > 0) 
        <section class="cartItems">
            @foreach ($cart as $car)
            <div class="product">
                <h2>
                    {{$car->name}}
                </h2>
                <img src="{{asset($car->imageURL)}}" alt="error">
                <div class="price">
                    $ {{$car->price}}
                </div>
                <form action="/removeFromCart">
                    <input type="hidden" name="id" value="{{$car->id}}">
                    <input type="submit" class="btn" value="Remove">
                </form>
            </div>
            @endforeach
            
        </section>
        <form action="{{route("checkout")}}" class="checkout" method="post">
            @csrf
            @foreach ($cart as $car)
                <input type="hidden" name="id" value="{{$car->id}}">
            @endforeach
            <input type="submit" value="Checkout" class="btn">
        </form>
        @else

        <h1>Cart is Empty</h1>
        @endif
        


@endsection