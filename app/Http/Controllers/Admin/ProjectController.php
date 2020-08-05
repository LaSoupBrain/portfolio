<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Project;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

/**
 * Class ProjectController
 *
 * @package App\Http\Controllers\Admin
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.pages.projects.index', ['projects' => Project::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectRequest $projectRequest
     *
     * @return Response
     */
    public function store(ProjectRequest $projectRequest)
    {
        $projectRequest->request->add(
            ['slug' => Str::slug($projectRequest->name)]
        );

        Project::create($projectRequest->all());

        return redirect()->route('project.index')->with('status', 'Successfully Inserted!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     *
     * @return Response
     */
    public function show(Project $project)
    {
        return view('admin.pages.projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     *
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('admin.pages.projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectRequest $projectRequest
     * @param  Project  $project
     *
     * @return Response
     */
    public function update(ProjectRequest $projectRequest, Project $project)
    {
        $projectRequest->request->add(
            ['slug' => Str::slug($projectRequest->name)]
        );

        $project->update($projectRequest->all());

        return redirect()->route('project.index')->with('status', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->back()->with('status', 'Successfully Deleted!');
    }
}
