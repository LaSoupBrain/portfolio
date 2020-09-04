@extends('admin.layouts.base')

@section('content')
    <h1>Projects page</h1>

    <a href="{{ route('project.create') }}">Create</a>
    
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Url</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @if (count($projects) === 0)
                <tr>
                    <td>No Projects found.</td>
                </tr>
            @else
                @foreach ($projects as $project)
                    <tr>
                        <th>{{ $project->id }}</th>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->url }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                        <td>
                            <a href="{{ route('project.show', $project) }}">Show</a>
                            |
                            <a href="{{ route('project.edit', $project) }}">Update</a>
                            |
                            <a href="{{ route('project.delete', $project) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
