@extends('admin.layouts.base')

@section('content')
    <h1>Projects page</h1>

    <a href="{{ route('projects.create') }}">Create project</a>
    
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Link</th>
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
                        <td>{{ $project->link }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                        <td>
                            <a href="#">Show</a>
                            |
                            <a href="#">Edit</a>
                            |
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
