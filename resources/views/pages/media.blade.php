@extends('layouts.master')

@section('title','Media')

@section('content')
    <div class="products">
        @for($i = 0; $i < count($media); $i++)
            <div class="product">
                <img src="{{asset($media[$i]->image1)}}" alt="err">
                <h3>$ {{$media[$i]->price}}</h3>
                <h2>{{$media[$i]->name}}</h2>
                <form action="/details">
                    @csrf
                    <input type="hidden" name="id" value="{{$media[$i]->id}}">
                    <input type="hidden" name="name" value="{{$media[$i]->name}}">
                    <input type="submit" class="btn" value="Details" name="details">
                </form>
            </div>
        @endfor
    </div>
@endsection