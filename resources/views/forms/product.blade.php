@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-header">New product</h4>
            <div class="card-body">
                <form action="{{ route('produit') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Nom produit"  @if(isset($product)) value="{{  $product->name }}" @else value="{{  old('name') }}" @endif>
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price" placeholder="Prix" @if(isset($product)) value="{{  $product->price }}" @else value="{{  old('price') }}" @endif>
                                {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" id="image">
                                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @isset($product)
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                @endisset
                                <button type="submit" class="btn btn-secondary">@if(isset($product)) Valider @else Ajouter @endif</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
