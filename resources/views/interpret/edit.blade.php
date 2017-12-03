@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">Edit interpret</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('interpret.edit', $interpretItem->getId()) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $interpretItem->getName() }}" placeholder="Concert name" autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <input id="description" type="text" class="form-control" name="description" value="{{ $interpretItem->getDescription() }}" placeholder="Description" autofocus>
                        @if ($errors->has('description'))
                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('members') ? ' has-error' : '' }}">
                        <input id="members" type="text" class="form-control" name="members" value="{{ $interpretItem->getMembers() }}" placeholder="Members" required>
                        @if ($errors->has('members'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('members') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                        <input id="genre" type="text" class="form-control" name="genre" value="{{ $interpretItem->getGenre() }}" placeholder="Genre" required>
                        @if ($errors->has('genre'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('genre') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                        <input id="publisher" type="text" class="form-control" name="publisher" value="{{ $interpretItem->getPublisher() }}" placeholder="Publisher" required>
                        @if ($errors->has('publisher'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('publisher') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <input id="image" type="file" name="image" value="{{ $interpretItem->getImage() }}">
                        @if ($errors->has('image'))
                            <span class="help-block" style="color:red"><strong>{{ $errors->first('image') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('formed_at') ? ' has-error' : '' }}">
                        <input id="formed_at" type="datetime-local" class="form-control" value="{{ $interpretItem->getFormedAt() }}" name="formed_at" placeholder="Formed At" required>
                        @if ($errors->has('formed_at'))
                            <span class="help-block"><strong>{{ $errors->first('formed_at') }}</strong></span>
                        @endif
                    </div>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Edit interpret</button>
                </form>
            </div>
        </div>

    </div>
@endsection
