@extends('layouts.admin')
@section('title', 'Create Tour Dates')

@section('content')
    <h1>Create tour dates</h1>
    <form action="/addToTour" method="post" class="loginForm">
        @csrf
        <input type="text" class="input" name="location" placeholder="Location:" />
        <input type="date" class="input" name="date" />
        <input type="submit" class="btn" name="addtour" value="Add">
    </form>
@endsection