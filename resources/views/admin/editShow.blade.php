@extends('layouts.admin')

@section('title', 'Edit Show')

@section('content')
    <form action="/editTour" method="post" class="loginForm">
        @csrf
        <input type="text" class="input" name="location" value="{{$show[0]->location}}">
        <input type="date" class="input" name="date" value="{{$show[0]->date}}">
        <input type="submit" class="btn" value="Update">
    </form>
@endsection