@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
    <h1>Orders</h1>
   <div class="order">
        <table>
            <tbody></tbody>
        </table>
        <script src="{{asset('js/getOrders.js')}}" defer></script>
   </div>
@endsection