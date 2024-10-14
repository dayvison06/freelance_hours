<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Proposals extends Component
{
    public Project $project;

    #[Computed()]
    public function proposals()
    {
        return $this->project->proposals()->orderByDesc('hours')
            ->get();
    }

    public function render()
    {
        return view('livewire.projects.proposals');
    }
}
