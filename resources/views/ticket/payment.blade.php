@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">This is payment simulation</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                {{--<form method="POST" action="{{ route('home.index') }}" enctype="multipart/form-data">--}}
                {{--<form method="POST" action="#" enctype="multipart/form-data">--}}
                    {{ csrf_field() }}
                <form class="form-group">
                    <b>Order:</b> {{ $ticketItem->getIisTicketid() }}
                    <hr>
                    <b>Event:</b> {{ $ticketItem->getEventItem()->getName() }} <br>
                    <b>Location:</b> {{ $ticketItem->getEventItem()->getLocation() }} <br>
                    <b>Description:</b> {{ $ticketItem->getEventItem()->getDescription() }} <br>
                    <hr>
                    <b>Type:</b> {{ $ticketItem->getType() }} <br>
                    <b>Price:</b> {{ $ticketItem->getPrice() }},- Kč.
                    <hr>
                    <br>

                <a href="{{ route('home.index') }}"><button class="btn btn-lg btn-outline-danger" type="button">Pay</button></a>
                </form>
            </div>
        </div>

    </div>
@endsection
