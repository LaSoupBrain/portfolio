<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Projects;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ProjectsController
 *
 * @package App\Http\Controllers\Admin
 */
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.pages.projects.index', ['projects' => Projects::all()]);
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Projects::create($this->validateProjects($request));

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Projects  $projects
     * @return Response
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Projects  $projects
     * @return Response
     */
    public function edit(Projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Projects  $projects
     * @return Response
     */
    public function update(Request $request, Projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Projects  $projects
     * @return Response
     */
    public function destroy(Projects $projects)
    {
        //
    }

    /**
     * Validate article attributes.
     *
     * @param Request $request
     *
     * @return array
     */
    public function validateProjects(Request $request): array
    {
        return $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'link' => 'required',
            'slug' => 'required',
        ]);
    }
}
