@extends('admin.layouts.base')

@section('content')
    <h1>Create page</h1>

    <form action="{{ route('projects.store') }}" method="POST">
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
        <label>Link</label>
        <input type="text" name="link" value="{{ old('link') }}" />
        @error('link')
            <p style="color: red">{{ $errors->first('link') }}</p>
        @enderror
        <br>
        <label>Slug</label>
        <input type="text" name="slug" value="{{ old('slug') }}" />
        @error('slug')
            <p style="color: red">{{ $errors->first('slug') }}</p>
        @enderror

        <button type="submit">Save</button>
    </form>
@endsection
