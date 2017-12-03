@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center"><b>Interpret:</b> {{ $interpretItem->getName() }}</h1>
        <hr>
        <a href="{{ route('interpret.editForm', $interpretItem->getId()) }}">
            <button type="button" class="btn btn-info">Edit concert</button>
        </a>
        <a href="{{ route('interpret.delete', $interpretItem->getId()) }}">
            <button type="button" class="btn btn-danger">Delete concert</button>
        </a>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">

                <div class="left-column">
                    <img src="{{  $interpretItem->getImage() }}" onerror="this.src='{{ Storage::url($interpretItem->getImage()) }}';" alt="Interpret Image" style="width: 500px">
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
