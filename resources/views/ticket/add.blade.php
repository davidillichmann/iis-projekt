@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">Buy ticket for {{ $concertItem->getName() }}</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('ticket.sent', $concertItem->getId()) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="ticketTypeId">Select Ticket</label>
                        <select class="form-control" id="ticketTypeId" name="ticketTypeId">
                            @foreach($ticketTypeItems as $ticketTypeItem)
                                <option value="{{ $ticketTypeItem->getIisTicketTypeid() }}">{{ $ticketTypeItem->getType() }} ({{ $ticketTypeItem->getPrice() }},- Kc)</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Buy</button>
                </form>
            </div>
        </div>

    </div>
@endsection
