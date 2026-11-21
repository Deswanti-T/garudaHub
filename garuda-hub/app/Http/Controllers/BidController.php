<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Project;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'harga'        => 'required|integer|min:1',
            'durasi'       => 'required|integer|min:1',
            'proposal'     => 'required|string',
        ]);

                Bid::updateOrCreate(
            ['project_id' => $project->id, 'developer_id' => auth()->id()],
            $data
        );

        return redirect()->route('projects.show', $project);
    }

    public function pickWinner(Bid $bid)
    {
        $bid->project->bids()->update(['is_winner' => false]);
        $bid->update(['is_winner' => true]);
        $bid->project->update(['status' => 'ditutup']);

        return redirect()->route('projects.show', $bid->project_id);
    }

    public function destroy(Bid $bid)
    {
        $projectId = $bid->project_id;
        $bid->delete();

        return redirect()->route('projects.show', $projectId);
    }
}