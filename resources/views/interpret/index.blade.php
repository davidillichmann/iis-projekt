@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Interprets</h1>
        <hr>
        @if(session('role') == "admin" || session('role') == "organiser")
            <a href="{{ route('interpret.add') }}">
                <button type="button" class="btn btn-success">New interpret</button>
            </a>
            <hr>
        @endif

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                @foreach($interpretItems as $interpretItem)
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{ $interpretItem->getImage() }}" onerror="this.src='{{ Storage::url($interpretItem->getImage()) }}';" alt="{{ $interpretItem->getName() }}">
                            <div class="card-body">
                                <h4 class="card-title" align="center">
                                    <a href="{{ route('interpret.show', $interpretItem->getId()) }}">{{ $interpretItem->getName() }}</a>
                                </h4>
                                <p class="card-text">

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
