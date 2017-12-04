@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">New concert</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('concert.sent') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Concert name" autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Description" autofocus>
                        @if ($errors->has('description'))
                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                        <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="Location" required>
                        @if ($errors->has('location'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('location') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <input id="image" type="file" name="image" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('image') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                        <input id="capacity" type="number" class="form-control" value="{{ old('capacity') }}" name="capacity" placeholder="Capacity" required>
                        @if ($errors->has('capacity'))
                            <span class="help-block"><strong>{{ $errors->first('capacity') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <input id="date" type="date" class="form-control" value="{{ old('date') }}" name="date" placeholder="Date" required>
                        @if ($errors->has('date'))
                            <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                        @endif
                    </div>
                    <p style="color: orangered;">All fields are required</p>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Create concert</button>
                </form>
            </div>
        </div>

    </div>
@endsection
