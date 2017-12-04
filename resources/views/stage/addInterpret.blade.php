@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">Add Interpret to stage</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('stage.sentInterpret', ['festivalid' => $festivalId, 'stageid' => $stageId]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="interpretId">Select interpret</label>
                        <select class="form-control" id="interpretId" name="interpretId">
                            @foreach($interpretItems as $interpretItem)
                                <option value="{{ $interpretItem->getId() }}">{{ $interpretItem->getName() }}</option>
                            @endforeach
                        </select>
                        <i>Can not find your interpret in our database?</i>
                    <a href="{{ route('interpret.add') }}">
                        <button type="button" class="btn btn-success">Create new interpret</button>
                    </a>
                    </div>

                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label for="date">Date&Time</label>
                        <input id="date" type="datetime-local" class="form-control" value="{{ old('date') }}" name="date" placeholder="Date" required>
                        @if ($errors->has('date'))
                            <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                        @endif
                    </div>
                    <p style="color: orangered;">All fields are required</p>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Add interpret to Concert</button>
                </form>
            </div>
        </div>

    </div>
@endsection
