@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    
    @foreach($items as $item)
        <form action="/editProduct" class="addproduct" enctype="multipart/form-data" method="post">
            @csrf
            <img src="{{asset($item->image1)}}" alt="err">
            <h4>Title</h4>
            <input type="text" name="name" value="{{$item->name}}">
            <h4>Description</h4>
            <textarea name="desc" cols="30" rows="10">{{$item->description}}</textarea>
            <h4>Price</h4>
            <input type="decimal" name="price" value="{{$item->price}}">
            <h4>Stock Qty?</h4>
            <input type="text" name="qty" value="{{$item->qty}}">
            <h4>Type?</h4>
            <select name="type">
                <option value="merch">Merch</option>
                <option value="media">Media</option>
            </select>
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="submit" value="Update Product" class="btn">
        </form>
        <form action="/editProductImages" class="addproduct" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="file" name="image1" value="{{asset($item->image1)}}">
            <input type="file" name="image2" value="{{asset($item->image2)}}">
            <input type="file" name="image3" value="{{asset($item->image3)}}">
            <input type="file" name="image4" value="{{asset($item->image4)}}">
            <input type="file" name="image5" value="{{asset($item->image5)}}">
            <input type="submit" value="Update Images" class="btn">
        </form>
    @endforeach
    
@endsection