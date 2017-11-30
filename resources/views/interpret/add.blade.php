@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">New interpret</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('interpret.sent') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('members') ? ' has-error' : '' }}">
                        <input id="members" type="text" class="form-control" name="members" value="{{ old('members') }}" placeholder="Members" autofocus>
                        @if ($errors->has('members'))
                            <span class="help-block"><strong>{{ $errors->first('members') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                        <input id="genre" type="text" class="form-control" name="genre" value="{{ old('genre') }}" placeholder="Genre" autofocus>
                        @if ($errors->has('genre'))
                            <span class="help-block"><strong>{{ $errors->first('genre') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                        <input id="publisher" type="text" class="form-control" name="publisher" value="{{ old('publisher') }}" placeholder="Publisher" autofocus>
                        @if ($errors->has('publisher'))
                            <span class="help-block"><strong>{{ $errors->first('publisher') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Description" autofocus>
                        @if ($errors->has('description'))
                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <input id="image" type="file" name="image" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('image') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('formed_at') ? ' has-error' : '' }}">
                        <input id="formed_at" type="date" class="form-control" value="{{ old('formed_at') }}" name="formed_at" placeholder="Formed at" required>
                        @if ($errors->has('formed_at'))
                            <span class="help-block"><strong>{{ $errors->first('formed_at') }}</strong></span>
                        @endif
                    </div>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Register interpret</button>
                </form>
            </div>
        </div>

    </div>
@endsection
