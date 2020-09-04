@extends('admin.layouts.base')

@section('content')
    <h1>Create page</h1>

    <a href="{{ route('project.index') }}">List page</a>

    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" />
        @error('name')
            <p style="color: red">{{ $errors->first('name') }}</p>
        @enderror

        <br>

        <label>Description</label>
        <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <p style="color: red">{{ $errors->first('description') }}</p>
        @enderror

        <br>

        <label>Url</label>
        <input type="text" name="url" value="{{ old('url') }}" />
        @error('url')
            <p style="color: red">{{ $errors->first('url') }}</p>
        @enderror

        <br>

        <input type="file" name="image" id="image">

        <br>

        <button type="submit">Save</button>
    </form>
@endsection
