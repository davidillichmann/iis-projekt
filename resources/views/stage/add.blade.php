@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">Add stage to festival</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('stage.sent', $festivalId) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Stage name" autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Add stage to festival</button>
                </form>
            </div>
        </div>

    </div>
@endsection
