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
     * @author Ali, Muamar
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
     * @author Ali, Muamar
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
     * @author Ali, Muamar
     *
     * @return Response
     */
    public function store(ProjectRequest $projectRequest)
    {
        $project = new Project();

        $project->name = $projectRequest->name;
        $project->description = $projectRequest->description;
        $project->url = $projectRequest->url;
        $project->image = $this->uploadImage($projectRequest);
        $project->slug = Str::slug($projectRequest->name);
        $project->save();

        return redirect()->route('project.index')->with('status', 'Successfully Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     *
     * @author Ali, Muamar
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
     * @author Ali, Muamar
     *
     * @return Response
     */
    public function update(ProjectRequest $projectRequest, Project $project)
    {
        $project->name = $projectRequest->name;
        $project->description = $projectRequest->description;
        $project->url = $projectRequest->url;
        $project->image = $this->updateImage($projectRequest, $project->image);
        $project->slug = Str::slug($projectRequest->name);
        $project->save();

        return redirect()->route('project.index')->with('status', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     *
     * @throws \Exception
     * @author Ali, Muamar
     *
     * @return Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->back()->with('status', 'Successfully Deleted!');
    }

    /**
     * Upload image.
     *
     * @param $projectRequest
     *
     * @return string
     */
    public function uploadImage($projectRequest)
    {
        $image = $projectRequest->image;

        $filename = sprintf(
            '%s.%s',
            Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)),
            $image->guessExtension()
        );

        $image->move(public_path('images'), $filename);

        return $filename;
    }

    /**
     * Upload image.
     *
     * @param $projectRequest
     *
     * @return string
     */
    public function updateImage($projectRequest, $oldImage)
    {
        $image = $projectRequest->image;

        if (empty($image)) {
            $result = $oldImage;
        } else {
            $filename = sprintf(
                '%s.%s',
                Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)),
                $image->guessExtension()
            );

            $image->move(public_path('images'), $filename);

            $result = $filename;
        }

        return $result;
    }
}
