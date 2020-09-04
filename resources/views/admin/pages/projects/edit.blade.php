@extends('admin.layouts.base')

@section('content')
    <h1>Edit page</h1>

    <a href="{{ route('project.index') }}">List page</a>

    <form action="{{ route('project.update', $project) }}" method="POST">
        @csrf
        @method ('PUT')
        <label>Name</label>
        <input type="text" name="name" value="{{ $project->name }}" />
        @error('name')
            <p style="color: red">{{ $errors->first('name') }}</p>
        @enderror

        <br>

        <label>Description</label>
        <textarea name="description">{{ $project->description }}</textarea>
        @error('description')
            <p style="color: red">{{ $errors->first('description') }}</p>
        @enderror

        <br>

        <label>Url</label>
        <input type="text" name="url" value="{{ $project->url }}" />
        @error('url')
            <p style="color: red">{{ $errors->first('url') }}</p>
        @enderror

        <br>

        <input type="file" name="image" id="image">

        <br>

        <button type="submit">Save</button>
    </form>
@endsection
