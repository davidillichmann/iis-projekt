@extends('layouts.master')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        <h1 class="text-left">Add Ticket to concert</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('festival.sentTicketType', ['eventId' => $eventId, 'festivalId' => $festivalId]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type">Select ticket type:</label>
                            <select class="form-control" id="type" name="type">
                                <option>Child</option>
                                <option>Adult</option>
                                <option>Senior</option>
                                <option>Student</option>
                            </select>
                        @if ($errors->has('type'))
                            <span class="help-block"><strong>{{ $errors->first('type') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">Price</label>
                        <input id="price" type="number" class="form-control" value="{{ old('price') }}" name="price" placeholder="Price" required>
                        @if ($errors->has('price'))
                            <span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>
                        @endif
                    </div>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Add Ticket</button>
                </form>
            </div>
        </div>

    </div>
@endsection
