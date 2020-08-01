<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * GET /projects
     * Get a listing of all projects.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projects = Project::alphabetical()->paginate(25);

        $page = $request->get('page');
        $title = $page ? "All projects (Page {$page})" : 'All projects';

        return view('projects.index', compact('projects'))
            ->withTitle($title);
    }

    /**
     * GET /projects/project-slug
     * Get a single project.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'))
            ->withTitle($project->name)
            ->withDescription(str_limit($project->description, 160));
    }
}
