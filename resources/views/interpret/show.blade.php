@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Interpret</h1>
        <hr>
        <h1 class="text-center">{{ $interpretItem->getName() }}</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">

                <div class="left-column">
                    <img src="{{  Storage::url($interpretItem->getImage()) }}" alt="Interpret Image" style="width: 500px">
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
