@extends('layouts.admin')
@section('title', 'Add Products')

@section('content')
    <h1>Add Products</h1>
    <form action="/addproduct" method="post" class="addproduct" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Product Name: ">
        <textarea name="description" style="font-family: helvetica;" id="" placeholder="Description: " cols="30" rows="10"></textarea>
        <input type="file" name="image1" value="image">
        <input type="file" name="image2" value="image">
        <input type="file" name="image3" value="image">
        <input type="file" name="image4" value="image">
        <input type="file" name="image5" value="image">
        <label for="type">Type:</label>
        <input type="text" name="type" id="">
        <label for="hasAttributes">Has Variants</label>
        <select name="hasatts">
            <option value="no">No</option>
            <option value="yes">Yes</option>
        </select>
        <div class="variants-container">
            <div class="variant-option">
                <input type="text" name="option1" placeholder="Variant:">
                <button type="button" class="add-variant-option">+</button>
            </div>
        </div>
        <label for="instock">In Inventory:</label>
        <input type="number" name="qty" id="">
        <input type="number" placeholder="Price:" name="price" id="price" />
        <input type="submit" name='addToProducts' value='Submit to Site' class="btn">
    </form>
    <script src="{{asset('js/addProduct.js')}}"></script>
@endsection
