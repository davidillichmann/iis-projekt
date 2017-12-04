@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-left">Edit user</h1>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('user.edit', $userItem->getId()) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $userItem->getName() }}" placeholder="User name" autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <input id="phone" type="number" class="form-control" value="{{ $userItem->getPhone() }}" name="phone" placeholder="Phone" required>
                        @if ($errors->has('phone'))
                            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                        @endif
                    </div>
                    <p style="color: orangered;">All fields are required</p>

                    <button class="btn btn-lg btn-outline-danger" type="submit">Edit user</button>
                </form>
            </div>
        </div>

    </div>
@endsection
