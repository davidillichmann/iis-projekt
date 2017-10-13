@extends('layouts.default')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Concert Page</h1>
        <hr>

        {{-- Page content--}}

        Concert ID = {{ $concertItem->getId() }} <br>
        Event ID = {{ $concertItem->getIisEventId() }} <br>
        Capacity = {{ $concertItem->getCapacity() }} <br>
        Date = {{ $concertItem->getDate() }} <br>

        Name = {{ $concertItem->getName() }} <br>
        Location = {{ $concertItem->getLocation() }} <br>

        Concert Created At = {{ $concertItem->getCreatedAt() }} <br>
        Event Created At = {{ $concertItem->getEventCreatedAt() }} <br>


    </div>
@endsection
