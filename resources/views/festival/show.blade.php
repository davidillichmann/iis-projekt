@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Festival Page</h1>
        <hr>

        {{-- Page content--}}
        <a href="{{ route('festival.editForm', $festivalItem->getId()) }}">
            <button type="button" class="btn btn-success">Edit festival</button>
        </a>
        <a href="{{ route('festival.delete', ['festivalid' => $festivalItem->getId(), 'eventid' => $festivalItem->getIisEventid()]) }}">
            <button type="button" class="btn btn-danger">Delete festival</button>
        </a>
        @if(Auth::guest())
        <!-- Neprihlaseny uzivatel -->
            <a href="{{ route('login') }}">
                <button type="button" class="btn btn-outline-success">Buy Tickets!</button>
            </a>
        @else
        <!-- Prihlaseny uzivatel -->
            <a href="{{ route('ticket.add', $festivalItem->getIisEventid()) }}">
                <button type="button" class="btn btn-outline-success">Buy Tickets!</button>
            </a>
        @endif
        <hr>

        <div class="container">
            <div class="row">
                <div class="left-column">
                    <img src="{{ $festivalItem->getImage() }}" alt="Concert Image" style="width: 500px">
                    <br>
                    <b>Tickets</b>: <br>
                    <a href="{{ route('festival.addTicketType', ['eventId' => $festivalItem->getIisEventid(), 'festivalId' => $festivalItem->getId()]) }}">
                        <button type="button" class="btn btn-success">Add New Ticket</button>
                    </a><br><hr>
                    <hr>


                    @foreach($festivalItem->getTickets() as $ticketTypeItem)
                        <b>Type</b>: {{ $ticketTypeItem->getType() }} <br>
                        <b>Price</b>: {{ $ticketTypeItem->getPrice() }} <br>
                        <a href="{{ route('festival.deleteTicketType', [$festivalItem->getId(), $ticketTypeItem->getIisTicketTypeid()]) }}">
                            <button type="button" class="btn btn-outline-danger">Delete Ticket</button>
                        </a>
                        <hr>
                    @endforeach
                </div>

                <div class="right-column">
                    <b>Name</b> = {{ $festivalItem->getName() }} <br>
                    <b>Location</b> = {{ $festivalItem->getLocation() }} <br>
                    <hr>
                    <b>Interval</b>: {{ $festivalItem->getInterval() }} <br>
                    <b>Order</b>: {{ $festivalItem->getOrder() }} <br>
                    <b>Start Date</b>: {{ $festivalItem->getStartDate() }} <br>
                    <b>End Date</b> = {{ $festivalItem->getEndDate() }} <br>

                    <hr>
                    <a href="{{ route('stage.add', $festivalItem->getId()) }}">
                        <button type="button" class="btn btn-success">Add stage to Festival</button>
                    </a> <br> <br>
                    @foreach($festivalItem->getStageItemsByFestivalId() as $stageItem)
                        Stage: <b>{{ $stageItem->getName() }}</b>
                        <a href="{{ route('stage.addInterpret', ['festivalid' => $festivalItem->getId(), 'stageid' => $stageItem->getId()]) }}">
                            <button type="button" class="btn btn-success btn-info btn-sm">Add interpret to stage</button>
                        </a>
                        <a href="{{ route('stage.editForm', ['festivalid' => $festivalItem->getId(), 'stageid' => $stageItem->getId()]) }}">
                            <button type="button" class="btn btn-info btn-sm">Edit stage</button>
                        </a>
                        <a href="{{ route('stage.delete', ['festivalid' => $festivalItem->getId(), 'stageid' => $stageItem->getId()]) }}">
                            <button type="button" class="btn btn-danger btn-info btn-sm">Delete stage</button>
                        </a> <br>
                        @foreach($stageItem->getInterpretAtStageItems() as $interpretAtStageItem)
                            <u>Interpret Name:</u> {{ $interpretAtStageItem->getName() }} <br>
                            <u>Time:</u> {{ $interpretAtStageItem->getDate() }}
                            <a href="{{ route('stage.deleteInterpret', ['festivalid' => $festivalItem->getId(), 'stageid' => $stageItem->getId(), 'stageinterpretid' => $interpretAtStageItem->getIisStageIisInterpretid()]) }}">
                                 <button type="button" class="btn btn-outline-danger btn-sm">Delete interpret from stage</button>
                            </a> <br> <hr>
                        @endforeach
                        <br>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
