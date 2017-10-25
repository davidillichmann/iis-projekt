@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Events</h1>
        <hr>

        {{-- Page filter --}}

        <form class="form-inline">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Event type:
                    <select class="form-control" id="eventType">
                        <option>---------</option>
                        <option>Concerts</option>
                        <option>Festivals</option>
                    </select>
                </label>
            </div>
            <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> Event
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Festival</a></li>
                        <li><a href="#">Concert</a></li>
                    </ul>
                </div>
            </div>
        </form>

        <hr>
        <h1 class="text-left">Concerts</h1>
        <hr>

            <div class="container">
                <div class="row">
                    @foreach($concertItems as $concertItem)
                    <div class="col-lg-3">
                        <div class="card h-100">

                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('concert.show', $concertItem->getId()) }}">Concert {{ $concertItem->getId() }}</a>
                                </h4>
                                <p class="card-text">
                                    Name = {{ $concertItem->getName() }} <br>
                                    <b>Date</b>: {{ $concertItem->getDate() }} <br>
                                    <b>Location</b>: {{ $concertItem->getLocation() }} <br>
                                    <b>Capacity</b>: {{ $concertItem->getCapacity() }} <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /.row -->
            </div>

        <hr>
        <h1 class="text-left">Festivals</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">

            <div class="row">
                @foreach($festivalItems as $festivalItem)
                    <div class="col-lg-3">
                        <div class="card h-100">

                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('festival.show', $festivalItem->getId()) }}">Festival {{ $festivalItem->getId() }}</a>
                                </h4>
                                <p class="card-text">
                                    <b>Name</b>: {{ $festivalItem->getName() }} <br>
                                    <b>Start Date</b>: {{ $festivalItem->getStartDate() }} <br>
                                    <b>End Date</b>: {{ $festivalItem->getEndDate() }} <br>
                                    <b>Location</b>: {{ $festivalItem->getLocation() }} <br>
                                    <b>Order</b>: {{ $festivalItem->getOrder() }} <br>
                                    <b>Interval</b>: {{ $festivalItem->getInterval() }} <br>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div>

    </div>
@endsection
