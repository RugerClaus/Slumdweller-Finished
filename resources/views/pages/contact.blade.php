@extends("layouts.master")

@section('title', 'Contact')

@section('content')
    <form action="/send" method="post" class="contact">
        @csrf
        <input class="input" type="text" name="name" placeholder="Name: " required>
        <input class="input" type="text" name="subject" placeholder="Subject: " required>
        <input class="input" type="text" name="email" placeholder="Email: " required>
        <textarea name="message" cols="30" rows="10" placeholder="Message: " required></textarea>
        <input type="submit" value="Send" class="btn" >
    </form>
@endsection