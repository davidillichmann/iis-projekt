@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Festival Page</h1>
        <hr>

        {{-- Page content--}}
        <a href="{{ route('stage.add', $festivalItem->getId()) }}">
            <button type="button" class="btn btn-success">Add stage to Festival</button>
        </a>
        <br>
        <hr>

        Festival ID = {{ $festivalItem->getId() }} <br>
        Event ID = {{ $festivalItem->getIisEventId() }} <br>
        Interval = {{ $festivalItem->getInterval() }} <br>
        Order = {{ $festivalItem->getOrder() }} <br>
        Start Date = {{ $festivalItem->getStartDate() }} <br>
        End Date = {{ $festivalItem->getEndDate() }} <br>
        <br>
        Name = {{ $festivalItem->getName() }} <br>
        Location = {{ $festivalItem->getLocation() }} <br>
        <br>
        Festival Created At = {{ $festivalItem->getCreatedAt() }} <br>
        Event Created At = {{ $festivalItem->getEventCreatedAt() }} <br>

        <hr>
        Festival stages: <br> <br>
        @foreach($festivalItem->getStageItemsByFestivalId() as $stageItem)
            <b>Stage Name:</b> {{ $stageItem->getName() }} <br>
            <a href="{{ route('stage.addInterpret', ['festivalid' => $festivalItem->getId(), 'stageid' => $stageItem->getId()]) }}">
                <button type="button" class="btn btn-success">Add interpret to stage</button>
            </a>
            <a href="{{ route('stage.editForm', ['festivalid' => $festivalItem->getId(), 'stageid' => $stageItem->getId()]) }}">
                <button type="button" class="btn btn-info">Edit stage</button>
            </a>
            <a href="{{ route('stage.delete', ['festivalid' => $festivalItem->getId(), 'stageid' => $stageItem->getId()]) }}">
                <button type="button" class="btn btn-danger">Delete stage</button>
            </a> <br>
            @foreach($stageItem->getInterpretAtStageItems() as $interpretAtStageItem)
                <b>Interpret Name:</b> {{ $interpretAtStageItem->getName() }} <br>
                <b>Time:</b> {{ $interpretAtStageItem->getDate() }}
                <a href="{{ route('stage.deleteInterpret', ['festivalid' => $festivalItem->getId(), 'stageid' => $stageItem->getId(), 'stageinterpretid' => $interpretAtStageItem->getIisStageIisInterpretid()]) }}">
                    <button type="button" class="btn btn-outline-danger">Delete interpret from stage</button>
                </a> <br>
            @endforeach
            <br>
        @endforeach

    </div>
@endsection
