@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center"><b>Interpret:</b> {{ $interpretItem->getName() }}</h1>
        <hr>
        @if(session('role') == "admin" || session('role') == "organiser")
            <a href="{{ route('interpret.editForm', $interpretItem->getId()) }}">
                <button type="button" class="btn btn-info">Edit interpret</button>
            </a>
            <a href="{{ route('interpret.delete', $interpretItem->getId()) }}">
                <button type="button" class="btn btn-danger">Delete interpret</button>
            </a>
        @endif

        @if(Auth::guest())
            <!-- Neprihlaseny uzivatel -->
            <a href="{{ route('login') }}">
                <button type="button" class="btn btn-outline-danger">❤ Follow</button>
            </a>
        @else
            <!-- Prihlaseny uzivatel -->
            @if($interpretItem->getUserInterpretBoolByInterpretId())
                <a href="{{ route('interpret.dislike', $interpretItem->getId()) }}">
                    <button type="button" class="btn btn-outline-danger">❤ Following</button>
                </a>
            @else
                <a href="{{ route('interpret.like', $interpretItem->getId()) }}">
                    <button type="button" class="btn btn-outline-danger">❤ Follow</button>
                </a>
            @endif
        @endif
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">

                <div class="left-column">
                    <img src="{{ $interpretItem->getImage() }}" onerror="this.src='{{ Storage::url($interpretItem->getImage()) }}';" alt="Interpret Image" style="width: 500px">
                </div>

                <div class="right-column">

                    <b>Members</b>: {{ $interpretItem->getMembers() }} <br>
                    <b>Genre</b>: {{ $interpretItem->getGenre() }} <br>
                    <b>Publisher</b>: {{ $interpretItem->getPublisher() }} <br>
                    <b>Formed At</b>: {{ $interpretItem->getFormedAt() }} <br>

                    <hr>

                    <b>Description</b>:
                    <p>{{ $interpretItem->getDescription() }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
