@extends('layouts.master')

@section('title','Merch')

@section('content')
    <div class="products">
        @foreach ($merchandise as $merch)
            <div class="product">
                <img src="{{asset($merch->image1)}}" alt="err">
                <h3>$ {{$merch->price}}</h3>
                <h2>{{$merch->name}}</h2>
                <form action="/details">
                    @csrf
                    <input type="hidden" name="id" value="{{$merch->id}}">
                    <input type="hidden" name="name" value="{{$merch->name}}">
                    <input type="submit" class="btn" value="Details" name="details">
                </form>
            </div>
        @endforeach
    </div>
@endsection