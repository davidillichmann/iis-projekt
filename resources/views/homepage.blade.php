@extends('layouts.master')

@section('content')
    <div class="container">

        <h1 class="text-center">Homepage</h1>
        <hr>

        <h1 class="text-left">Concerts</h1>

        @if(session('role') == "admin" || session('role') == "organiser")
            <a href="{{ route('concert.add') }}">
                <button type="button" class="btn btn-success">New concert</button>
            </a>
        @endif
        <hr>

        <div id="homepage__concert-carousel-indicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#homepage__concert-carousel-indicators" data-slide-to="0" class="active"></li>
                <li data-target="#homepage__concert-carousel-indicators" data-slide-to="1"></li>
                <li data-target="#homepage__concert-carousel-indicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($concertItems as $key => $concertItem)
                    @if ($key === 0)
                        <div class="carousel-item active">
                    @else
                        <div class="carousel-item">
                    @endif
                        <a href="{{ route('concert.show', $concertItem->getId()) }}">
                            <img class="d-block img-fluid" src="{{ $concertItem->getImage() }}" alt="{{ $concertItem->getName() }}">
                        </a>
                            <div class="carousel-caption d-none d-md-block">
                                <a href="{{ route('concert.show', $concertItem->getId()) }}">
                                    <h3>{{ $concertItem->getName() }}</h3>
                                </a>
                                <p>{{ $concertItem->getDate() }}</p>
                            </div>
                        </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#homepage__concert-carousel-indicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#homepage__concert-carousel-indicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <hr>
        <h1 class="text-left">Festivals</h1>

        @if(session('role') == "admin" || session('role') == "organiser")
            <a href="{{ route('festival.add') }}">
                <button type="button" class="btn btn-success">New festival</button>
            </a>
        @endif
        <hr>


            <div id="homepage__festival-carousel-indicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#homepage__festival-carousel-indicators" data-slide-to="0" class="active"></li>
                    <li data-target="#homepage__festival-carousel-indicators" data-slide-to="1"></li>
                    <li data-target="#homepage__festival-carousel-indicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($festivalItems as $key => $festivalItem)
                        @if ($key === 0)
                            <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                        @endif
                                        <a href="{{ route('festival.show', $festivalItem->getId()) }}">
                                            <img class="d-block img-fluid" src="{{ $festivalItem->getImage() }}" alt="{{ $festivalItem->getName() }}">
                                        </a>
                                        <div class="carousel-caption d-none d-md-block">
                                            <a href="{{ route('festival.show', $festivalItem->getId()) }}">
                                                <h3>{{ $festivalItem->getName() }}</h3>
                                            </a>
                                            <p>{{ $festivalItem->getStartDate() }} - {{ $festivalItem->getEndDate() }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#homepage__festival-carousel-indicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#homepage__festival-carousel-indicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                </div>
            </div>
            <hr>
        </div>
    </div>

@endsection
