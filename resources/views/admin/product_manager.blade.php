@extends('layouts.admin')
@section('title', 'Product Manager')

@section('content')
    <h1>Product Manager</h1>
    <table class="product_manager">
        <tr>
            <td><h3>Item Id</h3></td>
            <td><h3>Name</h3></td>
            <td><h3>Description</h3></td>
            <td><h3>Price</h3></td>
            <td><h3>Type</h3></td>
            <td><h3>Amount In Stock</h3></td>
            <td><h3>Created</h3></td>
            <td><h3>Updated</h3></td>
            <td><h3>Images</h3></td>
        </tr>
            @for($i = 0; $i< count($products); $i++)
                <tr>
                    <td>{{$products[$i]->id}}</td>
                    <td>{{$products[$i]->name}}</td>
                    <td>{{$products[$i]->description}}</td>
                    <td>$ {{$products[$i]->price}}</td>
                    <td>{{$products[$i]->type}}</td>
                    <td>{{$products[$i]->qty}}</td>
                    <td>{{$products[$i]->date_added}}</td>
                    <td>{{$products[$i]->updated_at}}</td>
                    <td>
                        @if(strlen($products[$i]->image1) > 10) 
                            <img src="{{asset($products[$i]->image1)}}">
                        @endif
                        @if(strlen($products[$i]->image2) > 10)
                            <img src="{{asset($products[$i]->image2)}}">
                        @endif
                        @if(strlen($products[$i]->image3) > 10) 
                            <img src="{{asset($products[$i]->image3)}}">
                        @endif
                        @if(strlen($products[$i]->image4) > 10)
                            <img src="{{asset($products[$i]->image4)}}">
                        @endif
                        @if(strlen($products[$i]->image5) > 10)
                            <img src="{{asset($products[$i]->image5)}}">
                        @endif
                    </td>
                    <td>
                        <form action="/editProductPage" method="get">
                            <input type="hidden" name="id" value="{{$products[$i]->id}}">
                            <input type="submit" name="edit" value="Edit" class="btn">
                        </form>
                    </td>
                    <td>
                        
                        
                        <form action="/deleteProduct" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$products[$i]->id}}">
                            <input type="submit" name="delete" value="Delete" class="btn">
                        </form>
                    </td>
                </tr>
            @endfor
        
    </table>
@endsection