@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">Buy ticket</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('ticket.sent') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="ticketTypeId">Select Ticket</label>
                        <select class="form-control" id="ticketTypeId" name="ticketTypeId">
                            @foreach($ticketTypeItems as $ticketTypeItem)
                                <option value="{{ $ticketTypeItem->getIisTicketTypeid() }}">{{ $ticketTypeItem->getType() }} ({{ $ticketTypeItem->getPrice() }},- Kc)</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Continue</button>
                </form>
            </div>
        </div>

    </div>
@endsection
