<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')->withCount('bids')->latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id'    => 'required|exists:users,id',
            'judul'        => 'required|string|max:200',
            'deskripsi'    => 'required|string',
            'kategori'     => 'required|string|max:50',
            'budget_min'   => 'required|integer|min:0',
            'budget_max'   => 'required|integer|gte:budget_min',
            'batas_lelang' => 'required|date',
        ]);

        Project::create($data);
        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        $project->load('client', 'bids.developer');
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'judul'        => 'required|string|max:200',
            'deskripsi'    => 'required|string',
            'kategori'     => 'required|string|max:50',
            'budget_min'   => 'required|integer|min:0',
            'budget_max'   => 'required|integer|gte:budget_min',
            'batas_lelang' => 'required|date',
            'status'       => 'required|in:terbuka,ditutup',
        ]);

        $project->update($data);
        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}