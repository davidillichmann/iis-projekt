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

        Name = {{ $eventItem->getName() }} <br>
        Location = {{ $eventItem->getLocation() }} <br>


    </div>
@endsection
