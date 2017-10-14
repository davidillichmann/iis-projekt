@extends('layouts.master')

@section('content')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="text-center">Events</h1>
        <hr>

        {{-- Page filter --}}

        <form class="form-inline">
            <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> Event
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Festival</a></li>
                        <li><a href="#">Concert</a></li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> Event
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Festival</a></li>
                        <li><a href="#">Concert</a></li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> Event
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Festival</a></li>
                        <li><a href="#">Concert</a></li>
                    </ul>
                </div>
            </div>
        </form>

        <hr>

        {{-- Page content--}}
        <div class="container">

            <div class="row">
                <div class="col-lg-3">
                    <div class="card h-100">

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Event One</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  portfolio-item">
                    <div class="card h-100">

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Event Two</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  portfolio-item">
                    <div class="card h-100">

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Event Three</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  portfolio-item">
                    <div class="card h-100">

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Event Four</a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->



        </div>


    </div>
@endsection
