@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Messages</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Modified</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        @foreach($messages as $message)
                        <tbody>
                            <tr>
                                <td>{{ $message->title }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->updated_at->diffForHumans() }}</td>
                                <td><a href="{{ url('messages/update',['id' => $message->id]) }}">Modifier</a></td>
                                <td><a href="{{ url('messages/delete',['id' => $message->id]) }}">Supprimer</a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="text-center">
                        {{ $messages->links() }}
                    </div>
                    <form action="{{ url('messages/create') }}" method="GET">
                        <button type="submit" class="btn btn-secondary">New</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
