@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Festival Page</h1>
        <hr>

        {{-- Page content--}}

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
            @foreach($stageItem->getInterpretAtStageItems() as $interpretAtStageItem)
                <b>Interpret Name:</b> {{ $interpretAtStageItem->getName() }} <br>
                <b>Time:</b> {{ $interpretAtStageItem->getDate() }} <br>
            @endforeach
            <br>
        @endforeach

    </div>
@endsection
