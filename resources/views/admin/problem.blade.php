@extends('layouts.admin')

@section('title', 'Report A Problem')

@section('content')

    <h1>File a ticket</h1>
    <form action="{{route('send.ticket')}}" method="post" class="ticket addproduct">
        @csrf
        <h2>Please describe your issue:</h2>
        <select name="code" class="selector dropdown-toggle">
            <option class="dropdown-item" value="selector">Choose one</option>
            <option class="dropdown-item" value="mail">Mail</option>
            <option class="dropdown-item" value="orders">Orders</option>
            <option class="dropdown-item" value="products">Products</option>
            <option class="dropdown-item" value="tour">Tour Dates</option>
            <option class="dropdown-item" value="customer">Main Site</option>
        </select>
        <textarea name="problem" style="font-family:helvetica;" cols="30" rows="10"></textarea>
        <input class="btn" type="submit" value="Submit">
    </form>
    <script src="{{asset('js/ticket.js')}}" defer></script>
@endsection