@extends('admin.layouts.base')

@section('content')
    <h1>Show page</h1>

    <a href="{{ route('project.index') }}">List page</a>

    <p>Name: {{ $project->name }}</p>
    <p>Description: {{ $project->description }}</p>
    <p>Url: {{ $project->url }}</p>
    <p>Slug: {{ $project->slug }}</p>
    <p>Image: </p>
    <img src="{{ asset('images/' . $project->image) }}">
@endsection
