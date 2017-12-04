@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Events</h1>
        <hr>

        {{-- Page filter --}}

        <form class="form-inline" action="{{ route('search.index') }}">
            <div class="form-group">
                <input name="q" class="form-control mr-sm-2" type="text" placeholder="Search" value="{{ request('q') }}">
                <label for="type">Event type:
                    <select name="type" class="form-control" id="type">
                        @if(request('type') == 1)
                            <option value="0">---------</option>
                            <option value="1" selected>Concerts</option>
                            <option value="2">Festivals</option>
                        @elseif(request('type') == 2)
                            <option value="0">---------</option>
                            <option value="1">Concerts</option>
                            <option value="2" selected>Festivals</option>
                        @else
                            <option value="0" selected>---------</option>
                            <option value="1">Concerts</option>
                            <option value="2">Festivals</option>
                        @endif
                    </select>
                </label>
            </div>
            <button type="submit" class="btn btn-success">Set filter</button>
        </form>

        @if(request('type') == 1 || request('type') == 0)
        <hr>
        <h1 class="text-left">Concerts</h1>

            <div class="container">
                <div class="row">
                    @if(! $concertItems)
                        <p>Your request does not match any results</p>
                    @endif
                    @foreach($concertItems as $concertItem)
                    <div class="col-lg-4">
                        <div class="card" style="margin-bottom: 30px">
                            <img class="card-img-top img-fluid" src="{{ $concertItem->getImage() }}" alt="{{ $concertItem->getName() }}">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('concert.show', $concertItem->getId()) }}">{{ $concertItem->getName() }}</a>
                                </h4>
                                <p class="card-text">
                                    <b>Date</b>: {{ date('d-m-Y', strtotime($concertItem->getDate())) }} <br>
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
        @endif
        @if(request('type') == 2 || request('type') == 0)
        <hr>
        <h1 class="text-left">Festivals</h1>

        {{-- Page content--}}
        <div class="container">

            <div class="row">
                @if(! $festivalItems)
                    <p>Your request does not match any results</p>
                @endif
                @foreach($festivalItems as $festivalItem)
                    <div class="col-lg-3">
                        <div class="card" style="margin-bottom: 30px">
                            <img class="card-img-top img-fluid" src="{{  Storage::url($festivalItem->getImage()) }}" onerror="this.src='{{ $festivalItem->getImage() }}';" alt="{{ $festivalItem->getName() }}">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('festival.show', $festivalItem->getId()) }}">{{ $festivalItem->getName() }}</a>
                                </h4>
                                <p class="card-text">
                                    <b>Start Date</b>: {{ date('d-m-Y', strtotime($festivalItem->getStartDate())) }} <br>
                                    <b>End Date</b>: {{ date('d-m-Y', strtotime($festivalItem->getEndDate())) }} <br>
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
        @endif

    </div>
@endsection
