@extends('layouts.master')
@section('title', 'Payment')
@section('content')
                    <div class="card-header">Make a Payment</div>


                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/process" id="payment-form">
                            @csrf

                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                {{$amount}}
                            </div>

                            <div class="form-group">
                                <label for="card-element">Credit or debit card</label>
                                <div id="card-element"></div>
                            </div>

                            <div id="card-errors" role="alert"></div>

                            <button type="submit" class="btn">Make Payment</button>
                        </form>

    <script src="https://js.stripe.com/v3/"></script>

    <script src="{{asset('js/stripe.js')}}"></script>
@endsection
