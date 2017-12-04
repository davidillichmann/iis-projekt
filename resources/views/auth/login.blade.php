@extends('layouts.master')

@section('content')

    <div class="login_background_image">
        <form class="form-signin" method="POST" action="/login">
            {{ csrf_field() }}

            <p style="color: yellow;">New to our website? <br>
                <a href="{{ route('register') }}" style="color: greenyellow"> Register here</a></p>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>

            <button class="btn btn-lg btn btn-outline-success" id="signButton" type="submit" style="color: greenyellow;">Sign in</button>
        </form>
    </div> <!-- /container -->

@endsection
