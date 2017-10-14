@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Festival Page</h1>
        <hr>

        {{-- Page content--}}

        Festival ID = {{ $festivalItem->getId() }} <br>
        Event ID = {{ $festivalItem->getIisEventId() }} <br>
        Frequency = {{ $festivalItem->getFrequency() }} <br>
        Length = {{ $festivalItem->getLength() }} <br>

        Name = {{ $festivalItem->getName() }} <br>
        Location = {{ $festivalItem->getLocation() }} <br>

        Festival Created At = {{ $festivalItem->getCreatedAt() }} <br>
        Event Created At = {{ $festivalItem->getEventCreatedAt() }} <br>

    </div>
@endsection
