@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

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
                          <th>Name</th>
                          <th>File</th>
                          <th>Modified</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      @foreach($products as $product)
                      <tbody>
                        <tr>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->price }}</td>
                          <td>{{ $product->image }}</td>
                          <td><img src="{{ URL::asset('/storage') }}/{{ $product->path }}" alt="{{ $product->image }}" width="100"></td>
                          <td>{{ $product->updated_at->diffForHumans() }}</td>
                          <td><a href="{{ url('products/update',['id' => $product->id]) }}">Modifier</a></td>
                          <td><a href="{{ url('products/delete',['id' => $product->id]) }}">Supprimer</a></td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                    <div class="text-center">
                        {{ $products->links() }}
                    </div>
                    <form action="{{ url('products/create') }}" method="GET">
                      <button type="submit" class="btn btn-secondary">New</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
