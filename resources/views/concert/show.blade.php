@extends('layouts.master')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        <h1 class="text-center">{{ $concertItem->getName() }}</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <div class="left-column">
                    <img src="{{ $concertItem->getImage() }}" onerror="this.src='{{ Storage::url($concertItem->getImage()) }}';" alt="Concert Image" style="width: 500px">

                    <b>Tickets</b>: <br>
                    @foreach($concertItem->getTickets() as $ticketTypeItem)
                        <b>Type</b>: {{ $ticketTypeItem->getType() }} <br>
                        <b>Price</b>: {{ $ticketTypeItem->getPrice() }} <br>
                        <hr>
                    @endforeach
                </div>

                <div class="right-column">

                    <b>Date</b>: {{ $concertItem->getDate() }} <br>
                    <b>Location</b>: {{ $concertItem->getLocation() }} <br>
                    <b>Capacity</b>: {{ $concertItem->getCapacity() }} <br>

                    <hr>

                    <b>Description</b>:
                    <p>{{ $concertItem->getDescription() }}</p>

                    <hr>
                    <b>Interprets</b>: <br>
                    @foreach($concertItem->getInterprets() as $interpretAtConcertItem)
                        <b>Interpret Name</b>:
                        <a href="{{ route('interpret.show', $interpretAtConcertItem->getId()) }}">
                            {{ $interpretAtConcertItem->getName() }}</a> <br>
                        <b>Members</b>: {{ $interpretAtConcertItem->getMembers() }} <br>
                        <b>Genre</b>: {{ $interpretAtConcertItem->getGenre() }} <br>
                        <b>Publisher</b>: {{ $interpretAtConcertItem->getPublisher() }} <br>
                        <b>Formed at</b>: {{ $interpretAtConcertItem->getFormedAt() }} <br>

                        <b>Order</b>: {{ $interpretAtConcertItem->getOrder() }} <br>
                        <b>Date/Time</b>: {{ $interpretAtConcertItem->getDate() }} <br>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
