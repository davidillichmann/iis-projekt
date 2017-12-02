@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">Edit stage</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('stage.edit', ['festivalid' => $festivalId, 'stageid' => $stageItem->getId()]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Stage name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $stageItem->getName() }}" placeholder="Stage name" autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <button class="btn btn-lg btn-outline-success" type="submit">Edit stage</button>
                </form>
            </div>
        </div>

    </div>
@endsection
