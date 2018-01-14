@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row card text-white bg-dark">
        <h4 class="card-header">New product</h4>
        <div class="card-body">
            <form action="{{ route('message') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" placeholder="Titre message" @if(isset($message)) value="{{ $message->title }}" @else value="{{ old('title')}}" @endif>
                    {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    <input type="text" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" placeholder="Message" @if(isset($message))value="{{ $message->message }}" @else value="{{ old('message') }}" @endif>
                    {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                @if(isset($message))
                <input type="hidden" name="id" value="{{ $message->id }}">
                @endif
                <button type="submit" class="btn btn-secondary">@if(isset($message)) Valider @else Ajouter @endif</button>
            </form>
        </div>
    </div>
</div>
@endsection
