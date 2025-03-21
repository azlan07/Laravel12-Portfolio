<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::with('user')
            ->latest()
            ->paginate(6);

        return view('welcome', compact('projects'));
    }
    public function show(Project $project)
    {
        return view('detailProject', compact('project'));
    }
}
