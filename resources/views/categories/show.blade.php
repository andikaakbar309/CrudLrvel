@extends('layout.app')

@section('content')

<a href="/categories" class="btn btn-secondary btn-sm mb-3">Back</a>
    <div class="container">
        <h3>ID: {{ $data->id }}</h3>
        <br>
        <h4>Name: {{ $data->name }}</h4>
        <h4>Description: {{ $data->description }}</h4>
        <h4>Sequence: {{ $data->seq }}</h4>
        <h4>Created: {{ $data->created_at }}</h4>
        <h4>Updated: {{ $data->updated_at }}</h4>
        <h4>Status: <p class="badge {{ $data->status == 'active' ? 'bg-primary' : 'bg-danger' }}">{{ $data->status }}</p></h4>
    </div>
@endsection