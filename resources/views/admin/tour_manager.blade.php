@extends('layouts.admin')
@section('title', 'Tour Manager')

@section('content')
    <h1>Tour Manager</h1>
    <table>
        @for ($i = 0; $i < count($dates); $i++)
            <tr>
                <td>{{$dates[$i]->date}}</td>
                <td>{{$dates[$i]->location}}</td>
                <td>
                    <form action="/tour_editor" method="get">
                        <input type="hidden" name="id" value="{{$dates[$i]->id}}" />
                        <input type="submit" name="edit" value="Edit">
                    </form>
                </td>
                <td>
                    <form action="/deleteTour" method="post">
                        @csrf
                        <input type="hidden" name='id' value="{{$dates[$i]->id}}">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
        @endfor
    </table>
@endsection