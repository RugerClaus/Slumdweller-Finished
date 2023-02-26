@extends('layouts.admin')

@section('title', "Reply")

@section('content')

    <form action="/reply" method="post" class="contact">
        @csrf
        <input type="text" class="input" name="to" value="To: {{$reply[0]->from}}" disabled >
        <input type="text" class="input" name="subject" value="Subject: {{$reply[0]->subject}}" disabled>
        <textarea name="message" id="" cols="30" rows="10" placeholder="Message: " required></textarea>
        <input type="submit" value="Send" class="btn">
    </form>

@endsection