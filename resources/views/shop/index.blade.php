@extends('layouts.app') @section('content')
<div class="row">
	@foreach($products as $product)
	<div class="col-sm-6 col-xs-12 col-md-4">
		<div class="thumbnail">
			<img src="{{$product->image}}">
			<div class="caption">
				<h3>{{$product->title}}</h3>
				<h2>{{$product->price}} €</h2>
				<p>{{$product->description}}</p>
				<p>
					<a href="{{route('product.add', ['id' => $product->id])}}" class="btn btn-primary" role="button">
						<i class="fa fa-plus" aria-hidden="true"></i> Ajouter au panier</a>
				</p>
			</div>
		</div>
	</div>
	@endforeach
</div>
{{$products->links()}} @endsection