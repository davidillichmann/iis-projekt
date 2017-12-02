@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">Edit festival</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('festival.edit', $festivalItem->getId()) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $festivalItem->getName() }}" placeholder="Festival name" autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <input id="description" type="text" class="form-control" name="description" value="{{ $festivalItem->getDescription() }}" placeholder="Description" autofocus>
                        @if ($errors->has('description'))
                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                        <input id="location" type="text" class="form-control" name="location" value="{{ $festivalItem->getLocation() }}" placeholder="Location" required>
                        @if ($errors->has('location'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('location') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <input id="image" type="file" name="image" value="{{ $festivalItem->getImage() }}">
                        @if ($errors->has('image'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('image') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('interval') ? ' has-error' : '' }}">
                        <input id="interval" type="text" class="form-control" value="{{ $festivalItem->getInterval() }}" name="interval" placeholder="Interval" required>
                        @if ($errors->has('interval'))
                            <span class="help-block"><strong>{{ $errors->first('interval') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                        <input id="order" type="number" class="form-control" value="{{ $festivalItem->getOrder() }}" name="order" placeholder="Order" required>
                        @if ($errors->has('order'))
                            <span class="help-block"><strong>{{ $errors->first('order') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                        <label for="start_date">Start date:</label>
                        <input id="start_date" type="date" class="form-control" value="{{ old('start_date') }}" name="start_date" placeholder="Start Date" required>
                        @if ($errors->has('start_date'))
                            <span class="help-block"><strong>{{ $errors->first('start_date') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                        <label for="end_date">End date:</label>
                        <input id="end_date" type="date" class="form-control" value="{{ old('end_date') }}" name="end_date" placeholder="End Date" required>
                        @if ($errors->has('end_date'))
                            <span class="help-block"><strong>{{ $errors->first('end_date') }}</strong></span>
                        @endif
                    </div>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Edit festival</button>
                </form>
            </div>
        </div>

    </div>
@endsection
