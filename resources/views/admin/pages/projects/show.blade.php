@extends('admin.layouts.base')

@section('content')
    <h1>Show page</h1>

    <a href="{{ route('project.index') }}">List page</a>

    <p>Name: {{ $project->name }}</p>
    <p>Description: {{ $project->description }}</p>
    <p>Link: {{ $project->link }}</p>
    <p>Slug: {{ $project->slug }}</p>
@endsection
