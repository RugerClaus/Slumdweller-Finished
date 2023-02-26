@extends('layouts.master')
@section('title', 'Welcome')

@section('content')
    @for($i = 0; $i < count($tours); $i++)

        <div class="shows">
            <div class="location">
                {{$tours[$i]->location}}
            </div>
            <div class="date">
                {{$tours[$i]->date}}
            </div>
        </div>

    @endfor
@endsection