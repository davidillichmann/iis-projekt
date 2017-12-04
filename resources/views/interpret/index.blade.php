@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Interprets</h1>
        <hr>
        <a href="{{ route('interpret.add') }}">
            <button type="button" class="btn btn-success">New interpret</button>
        </a>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                @foreach($interpretItems as $interpretItem)
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{ $interpretItem->getImage() }}" alt="{{ $interpretItem->getName() }}">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('interpret.show', $interpretItem->getId()) }}">Interpret {{ $interpretItem->getId() }}</a>
                                </h4>
                                <p class="card-text">
                                    {{--Name = {{ $concertItem->getName() }} <br>--}}

                                    <b>Description</b>: {{ $interpretItem->getDescription() }} <br>
                                    <b>Members</b>: {{ $interpretItem->getMembers() }} <br>
                                    <b>Genre</b>: {{ $interpretItem->getGenre() }} <br>
                                    <b>Publisher</b>: {{ $interpretItem->getPublisher() }} <br>
                                    <b>Formed at</b>: {{ $interpretItem->getFormedAt() }} <br>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- /.row -->
        </div>

    </div>
@endsection
