@extends('layouts.master')

@section('content')
    <div class="container">

        <a href="{{ route('user.editForm', $loggedUserItem->getId()) }}">
            <button type="button" class="btn btn-outline-success">Edit profile</button>
        </a>
        <a href="{{ route('user.deactivate', $loggedUserItem->getId()) }}">
            <button type="button" class="btn btn-outline-danger">Deactivate profile</button>
        </a>
        <hr>

        {{-- Page content--}}
        <div class="container">
            <div class="row">

                <div>

                    <b>Name</b>: {{ $loggedUserItem->getName() }} <br>
                    <b>Email</b>: {{ $loggedUserItem->getEmail() }} <br>
                    <b>Phone</b>: {{ $loggedUserItem->getPhone() }} <br>
                    <b>Role</b>: {{ $loggedUserItem->getRole() }} <br>

                </div>
            </div>
        </div>
        <hr>
        @if($loggedUserItem->isAdmin())
            <b>Users administration:</b>
                <table class="table thead-inverse">
                    <tr>
                        {{--<th>User Id</th>--}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Manage Role</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($userItems as $userItem)
                    <tr>
                        {{--<td>{{ $userItem->getID() }}</td>--}}
                        <td>{{ $userItem->getName() }}</td>
                        <td>{{ $userItem->getEmail() }}</td>
                        <td>{{ $userItem->getPhone() }}</td>
                        <td>{{ $userItem->getRole() }}</td>
                        <td>
                            @if($userItem->getRole() == 'user')
                                <a href="{{ route('user.changeToOrganiser', $userItem->getId()) }}">Change to Organiser</a>
                            @elseif($userItem->getRole() == 'organiser')
                                <a href="{{ route('user.changeToUser', $userItem->getId()) }}">Change to User</a>
                            @endif
                        </td>
                        <td>
                            @if(!$userItem->isAdmin())
                            <a href="{{ route('user.delete', $userItem->getId()) }}">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
        <hr>
        @else
            <table class="table thead-inverse">
                <tr>
                    <th>Event</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Code</th>
                    <th>Purchased</th>
                </tr>
                @foreach($loggedUserItem->getTicketItemsByUserId() as $ticketItem)
                    <tr>
                        <td>{{ $ticketItem->getEventItem()->getName() }}</td>
                        <td>{{ $ticketItem->getType() }}</td>
                        <td>{{ $ticketItem->getPrice() }}</td>
                        <td>{{ $ticketItem->getCode() }}</td>
                        <td>{{ $ticketItem->getCreatedAt() }}</td>
                    </tr>
                @endforeach
            </table>
            <hr>
        @endif



    </div>
@endsection
