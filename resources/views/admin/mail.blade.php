@extends('layouts.admin')

@section('title', 'Mail')

@section('content')
    <table class="product_manager">
        <tr>
            <td>
                ID:
            </td>
            <td>
                From:
            </td>
            <td>
                Subject:
            </td>
            <td>
                Message:
            </td>
        </tr>
        @for ($i = 0; $i < count($mail); $i++)
            <tr>
                <td>
                    {{$mail[$i]->id}}
                </td>
                <td>
                    {{$mail[$i]->from}}
                </td>
                <td>
                    {{$mail[$i]->subject}}
                </td>
                <td>
                    {{$mail[$i]->message}}
                </td>
                <td>
                    <form action="/replyTo?={{$mail[$i]->from}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$mail[$i]->id}}">
                        <input type="submit" value="Reply">
                    </form>
                </td>
                <td>
                    <form action="/deleteEmail" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$mail[$i]->id}}">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endfor
    </table>
@endsection