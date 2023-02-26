@extends('layouts.master')
@section('title', 'Details')

@section('content')
    @foreach ($item as $ite)
    <div class="details">
        <h1>{{$ite->name}}</h1>
        <div class="productImageWrapper">
            <img src="{{asset($ite->image1)}}" class="productImage" alt="err">
            <div class="subimages">
                @if(strlen($ite->image2) > 10)
                    <img class="subimage" src="{{asset($ite->image2)}}">
                @endif
                @if(strlen($ite->image3) > 10) 
                    <img class="subimage" src="{{asset($ite->image3)}}">
                @endif
                @if(strlen($ite->image4) > 10)
                    <img class="subimage" src="{{asset($ite->image4)}}">
                @endif
                @if(strlen($ite->image5) > 10)
                    <img class="subimage" src="{{asset($ite->image5)}}">
                @endif
            </div>
        </div>
        
        <p class="price">$ {{$ite->price}}</p>
        <p>{{$ite->description}}</p>
        <form action="/addToCart" method="post">
            @csrf
            @if ($ite->hasAttributes === 1)
                <select name="variation">
                    @foreach($attributes as $attribute)
                        <option value="{{$attribute->options1}}">{{$attribute->options1}}</option>
                        <option value="{{$attribute->options2}}">{{$attribute->options2}}</option>
                        <option value="{{$attribute->options3}}">{{$attribute->options3}}</option>
                        <option value="{{$attribute->options4}}">{{$attribute->options4}}</option>
                        <option value="{{$attribute->options5}}">{{$attribute->options5}}</option>
                        <option value="{{$attribute->options6}}">{{$attribute->options6}}</option>
                        <option value="{{$attribute->options7}}">{{$attribute->options7}}</option>
                        <option value="{{$attribute->options8}}">{{$attribute->options8}}</option>
                        <option value="{{$attribute->options9}}">{{$attribute->options9}}</option>
                        <option value="{{$attribute->options10}}">{{$attribute->options10}}</option>
                    @endforeach
                </select>
            @else
            <input type="hidden" name='variation' value="0">
            @endif
            
            <input type="hidden" name="id" value="{{$ite->id}}">
            <input type="submit" class="btn" value="Add to Cart" name="addtocart">
        </form>
        
    </div>
    
    @endforeach
    
    
    <script src="{{asset("js/details.js")}}"></script>
@endsection