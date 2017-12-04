@extends('layouts.master')

@section('content')

    <div class="login_background_image">
        <form class="form-signin" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}


            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required>

                @if ($errors->has('email'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone number" required>

                @if ($errors->has('phone'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{--<label for="password" class="col-md-4 control-label"></label>--}}

                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                {{--<label for="password-confirm" class="col-md-4 control-label"></label>--}}

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <p style="color: orangered;">All fields are required</p>
            <button class="btn btn-lg btn btn-outline-success" type="submit">Register</button>
        </form>
    </div> <!-- /container -->

@endsection
